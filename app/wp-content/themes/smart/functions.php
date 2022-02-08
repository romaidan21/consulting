<?php

// Load WP tweaks
require_once TEMPLATEPATH . '/functions/tweaks.php';

// Pathes & shortcuts
require_once TEMPLATEPATH . '/functions/shortcuts.php';

// Load scripts & css styles
require_once TEMPLATEPATH . '/functions/scripts.php';

// Customize theme
require_once TEMPLATEPATH . '/functions/customize.php';

// Custom post types
require_once TEMPLATEPATH . '/functions/post-types.php';


// WP Multilang language switcher
function lang_switch()
{
    if (function_exists('wpm_get_languages')) {
        $languages = wpm_get_languages();
        $current   = wpm_get_language();

        $out = '<nav class="lang-wrap">';

        foreach ($languages as $code => $language) {
            $toggle_url  = esc_url(wpm_translate_current_url($code));
            $css_classes = 'lang-switch__link ';

            if ($code === $current) {
                $css_classes .= 'lang-switch__link-active';
            }

            $out .= '<a href="' . $toggle_url . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
            $out .= $language['name'];
            $out .= '</a>';
        }

        $out .= '</nav>';

        echo $out;
    }
}