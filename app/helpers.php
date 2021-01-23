<?php

if (! function_exists('present_asset')) {
    /**
     * Generate an asset path for the application based on environment.
     *
     * @param  string  $path
     * @return string
     */
    function present_asset($path, $environment)
    {
        return $environment == "production" ? asset($path, true) : asset($path);
    }
}
