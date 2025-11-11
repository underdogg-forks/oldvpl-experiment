<?php

namespace App\Http\Middleware;

use Closure;
use Modules\Currencies\Models\Currency;
use Modules\Settings\Models\Setting;
use App\Support\DateFormatter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('app.debug')) {
            DB::enableQueryLog();
        }

        // Set the application specific settings under fi. prefix (fi.settingName)
        if (Setting::setAll()) {
            if (config('ip.force_https') and !$request->secure()) {
                return redirect()->secure($request->getRequestUri());
            }

            // This one needs a little special attention
            $dateFormats = DateFormatter::formats();
            config(['ip.datepicker_format' => $dateFormats[config('ip.date_format')]['datepicker']]);

            // Set the environment timezone to the application specific timezone, if available, otherwise UTC
            date_default_timezone_set((config('ip.timezone') ?: config('app.timezone')));

            $mailPassword = '';

            try {
                $mailPassword = (config('ip.mail_password')) ? Crypt::decrypt(config('ip.mail_password')) : '';
            } catch (\Exception $e) {
                if (config('ip.mail_driver') == 'smtp') {
                    session()->flash('error', '<strong>' . trans('ip.error') . '</strong> - ' . trans('ip.mail_hash_error'));
                }
            }

            // Override the framework mail configuration with the values provided by the application
            config(['mail.driver' => (config('ip.mail_driver')) ? config('ip.mail_driver') : 'smtp']);
            config(['mail.host' => config('ip.mail_host')]);
            config(['mail.port' => config('ip.mail_port')]);
            config(['mail.encryption' => config('ip.mail_encryption')]);
            config(['mail.username' => config('ip.mail_username')]);
            config(['mail.password' => $mailPassword]);
            config(['mail.sendmail' => config('ip.mail_sendmail')]);

            if (config('ip.mail_allow_self_signed_certificate')) {
                config([
                    'mail.stream.ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ]);
            }

            // Force the mailer to use these settings
            (new \Illuminate\Mail\MailServiceProvider(app()))->register();

            // Set the base currency to a config value
            config(['ip.currency' => Currency::where('code', config('ip.base_currency'))->first()]);
        }

        config(['ip.client_center_request' => (($request->segment(1) == 'client_center') ? true : false)]);

        if (!config('ip.client_center_request')) {
            app()->setLocale((config('ip.language')) ?: 'en');
        } elseif (config('ip.client_center_request') and auth()->check() and auth()->user()->client_id) {
            app()->setLocale(auth()->user()->client->language);
        }

        config(['ip.mail_configured' => (config('ip.mail_driver') ? true : false)]);

        config(['ip.merchant' => json_decode(config('ip.merchant'), true)]);

        return $next($request);
    }
}
