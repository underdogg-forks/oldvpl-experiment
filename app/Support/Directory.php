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

class Directory
{
    /**
     * Provide an associative array of directory contents ['dir' => 'dir'].
     *
     * @param  string $path
     * @return array
     */
    public static function listAssocContents($path): array
    {
        $files = self::listContents($path);

        return array_combine($files, $files);
    }

    /**
     * Provide a list of directory contents minus the top directory.
     *
     * @param  string $path
     * @return array
     */
    public static function listContents($path): array
    {
        if (!is_dir($path)) {
            return [];
        }

        $contents = scandir($path);
        
        if ($contents === false) {
            return [];
        }

        return array_diff($contents, ['.', '..']);
    }

    /**
     * Provide a list of only directories.
     *
     * @param  string $path
     * @return array
     */
    public static function listDirectories($path): array
    {
        if (!is_dir($path)) {
            return [];
        }

        $directories = self::listContents($path);

        foreach ($directories as $key => $directory) {
            if (!is_dir($path . DIRECTORY_SEPARATOR . $directory)) {
                unset($directories[$key]);
            }
        }

        return $directories;
    }
}
