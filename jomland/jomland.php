<?php

/**
 * @author clarotm
 * Plugin Name: Motivational phrases | Jomalat Angizashi
 * Plugin URI: https://clarotm.ir/
 * Description: Incentive display on the site as a float by short code.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Amireza Heydari
 * Author URI: https://amirreza-heydari.clarotm.ir/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


// Short Code  => [angizeshi]
// File Read Text => jomalat.txt

function angizeshi_shortcode($atts, $content = null)
{
    $filePath = plugin_dir_path(__FILE__) . 'jomalat.txt';

    $jomleh = null;


    if (file_exists($filePath)) {
        $jomleh = file($filePath);
        $random_key = array_rand($jomleh);
    }
    // var_dump($jomleh);
    if (is_array($jomleh) && count($jomleh) > 0) {
        $html_inline = '
        <div class="angizeshi"><p>' . $jomleh[$random_key]  . '</p></div> ';

        return $html_inline;
    }
}
add_shortcode('angizeshi', 'angizeshi_shortcode');

/** */
function add_Csshead()
{ ?>
    <!-- ClaroTM - Amirreza Heydari-->

    <head>
        <style>
            @font-face {
                font-family: danapro;
                src: url("https://waregint.sirv.com/iseokar.ir/fonts/Dana-Regular.woff2") format("woff2");
                font-weight: 100;
                font-style: normal
            }

            .angizeshi {
                direction: rtl !important;
                display: block;
                font-family: danapro !important;
                position: fixed;
                left: 1em !important;
                bottom: 1em !important;
                background: red;
                max-width: 200px !important;
                max-height: auto !important;
                padding: .3em .2em !important;
                border-radius: 10px 10px 10px 0;
                background: rgba(255, 255, 255, .25);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, .37);
                backdrop-filter: blur(6px);
                -webkit-backdrop-filter: blur(6px);
                border: 1px solid rgba(255, 255, 255, .18)
            }

            .angizeshi p {
                color: #333;
                font-size: .7em;
                font-weight: 700
            }
        </style>

    <?php
}
add_action('wp_body_open', 'add_Csshead');
