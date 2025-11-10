<?php

namespace App;

use Illuminate\Foundation\Application as BaseApplication;

/**
 * Custom Application class for InvoicePlane.
 *
 * This class extends Laravel's base Application to provide
 * custom functionality specific to InvoicePlane.
 */
class Application extends BaseApplication
{
    /**
     * Get the path to the public directory.
     *
     * In InvoicePlane, the public directory is at the base path
     * instead of the typical public subdirectory.
     *
     * @return string
     */
    public function publicPath(): string
    {
        return $this->basePath();
    }

    /**
     * Get the base path of the Laravel installation.
     *
     * @param string $path Optionally, a path to append to the base path
     * @return string
     */
    public function basePath($path = ''): string
    {
        if (empty($path)) {
            return $this->basePath;
        }

        return $this->basePath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
}
