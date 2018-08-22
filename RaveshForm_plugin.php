<?php
/* 
Plugin Name: فرم‌ساز رَوش
Plugin URI: FarsiCom.com
Version: v1.0
Author: <a href="http://FarsiCom.com/">فارسیکام</a>
Description: افزونه نمایش  <b><a href="http://raveshcrm.ir/">فرم‌ساز رَوش</a></b> در وردپرس
*/

if (!class_exists("CrmPluginSeries")) {
    class CrmPluginSeries
    {
        function CrmPluginSeries()
        {
        }
    }
}

if (class_exists("CrmPluginSeries")) {
    $dl_pluginSeries = new CrmPluginSeries();
}

if (isset($dl_pluginSeries)) {

    setcookie('language', get_locale());

    function replaceShortCode($atts)
    {
        extract(shortcode_atts(array(
            "server" => 'http://',
            "domain" => '',
            "formid" => '0',
            "type" => 'inline',
            "title" => 'مشاهده‌ی فرم'
        ), $atts));

        if (substr($server, -1) != "/") $server = $server . "/";
        $scriptUrl = $server . "pages/formbuilder/ravesh-formbuilder.js";
        $formUrl = $server . $domain . "/formView/" . $formid;

        $result = "";
        if ($type == "inline") {
            $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"inline\"></script>";
        } else if ($type == "dialog") {
            $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"dialog\" form-link-text=\"" . $title . "\"></script>";
        } else if ($type == "fab") {
            $result .= "<script type=\"text/javascript\" src=\"" . $scriptUrl . "\" form-url=\"" . $formUrl . "\" form-style=\"fab\" form-link-text=\"" . $title . "\" form-button-color=\"#3f51b5\" form-button-icon=\"" . $server . "/pages/formbuilder/images/send-icon.png\"></script>";
        } else if ($type == "link") {
            $result .= "<a href=\"" . $formUrl . "\" target=\"_blank\">" . $title . "</a>";
        }
        $result = "\n<!--START---- RAVESH FORM BUILDER ---- RAVESHCRM.IR ----->\n" . $result . "\n<!--END--- RAVESH FORM BUILDER ---- RAVESHCRM.IR ----->\n";

        return $result;
    }

    add_shortcode('RaveshForm', 'replaceShortCode');
    function add_ravesh_button_to_mce()
    {
        // check user permissions
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        // check if WYSIWYG is enabled
        if ('true' == get_user_option('rich_editing')) {
            add_filter('mce_external_plugins', 'add_ravesh_tinymce_plugin');
            add_filter('mce_buttons', 'register_ravesh_mce_button');
        }
    }

    add_action('admin_head', 'add_ravesh_button_to_mce');
    function add_ravesh_tinymce_plugin($plugin_array)
    {
        $plugin_array['my_mce_button'] = plugin_dir_url('RaveshForm_mce_button.js') . 'RaveshFormBuilder/RaveshForm_mce_button.js';
        return $plugin_array;
    }

    function register_ravesh_mce_button($buttons)
    {
        array_push($buttons, 'my_mce_button');
        return $buttons;
    }
}
?>