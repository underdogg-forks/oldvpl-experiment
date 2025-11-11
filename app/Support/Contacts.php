<?php

/**
 * InvoicePlane
 *
 * @package     InvoicePlane
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (C) 2014 - 2018 InvoicePlane
 * @license     https://invoiceplane.com/license
 * @link        https://invoiceplane.com
 *
 * Based on FusionInvoice by Jesse Terry (FusionInvoice, LLC)
 */

namespace App\Support;

use Modules\Clients\Models\Client;

class Contacts
{
    private $client;
    private $user;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->user = auth()->user();
    }

    public function contactDropdownTo()
    {
        $allContacts = $this->getAllContacts();
        $selectedContacts = $this->getSelectedContactsTo()->toArray();

        $html = '<select name="to" id="to" multiple class="form-control">';
        foreach ($allContacts as $email => $label) {
            $selected = in_array($email, $selectedContacts) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($email) . '"' . $selected . '>' . htmlspecialchars($label) . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }

    private function getAllContacts()
    {
        $contacts = ($this->client->email) ? [$this->client->email => $this->getFormattedContact($this->client->name, $this->client->email)] : [];

        foreach ($this->client->contacts->pluck('name', 'email') as $email => $name) {
            $contacts[$email] = $this->getFormattedContact($name, $email);
        }

        $contacts[$this->user->email] = $this->getFormattedContact($this->user->name, $this->user->email);

        if (config('ip.mail_default_cc')) {
            $contacts[config('ip.mail_default_cc')] = config('ip.mail_default_cc');
        }

        if (config('ip.mail_default_bcc')) {
            $contacts[config('ip.mail_default_bcc')] = config('ip.mail_default_bcc');
        }

        return $contacts;
    }

    private function getFormattedContact($name, $email)
    {
        return $name . ' <' . $email . '>';
    }

    public function getSelectedContactsTo()
    {
        return $this->client->contacts->where('default_to', 1)->pluck('email')->prepend($this->client->email);
    }

    public function contactDropdownCc()
    {
        $allContacts = $this->getAllContacts();
        $selectedContacts = $this->getSelectedContactsCc();

        $html = '<select name="cc" id="cc" multiple class="form-control">';
        foreach ($allContacts as $email => $label) {
            $selected = in_array($email, $selectedContacts) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($email) . '"' . $selected . '>' . htmlspecialchars($label) . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }

    public function getSelectedContactsCc()
    {
        $contacts = $this->client->contacts
            ->where('default_cc', 1)
            ->pluck('email')
            ->toArray();

        if (config('ip.mail_default_cc')) {
            $contacts = array_merge($contacts, [config('ip.mail_default_cc')]);
        }

        return $contacts;
    }

    public function contactDropdownBcc()
    {
        $allContacts = $this->getAllContacts();
        $selectedContacts = $this->getSelectedContactsBcc();

        $html = '<select name="bcc" id="bcc" multiple class="form-control">';
        foreach ($allContacts as $email => $label) {
            $selected = in_array($email, $selectedContacts) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($email) . '"' . $selected . '>' . htmlspecialchars($label) . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }

    public function getSelectedContactsBcc()
    {
        $contacts = $this->client->contacts
            ->where('default_bcc', 1)
            ->pluck('email')
            ->toArray();

        if (config('ip.mail_default_bcc')) {
            $contacts = array_merge($contacts, [config('ip.mail_default_bcc')]);
        }

        return $contacts;
    }
}
