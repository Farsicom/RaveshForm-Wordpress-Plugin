<?php

    /*
Plugin Name: Ravesh Form Builder 
Plugin URI: raveshcrm.com
Version: v1.0
Author: <a href="https://raveshcrm.com/">raveshcrm</a>
Description: View plugin  <b><a href="http://raveshcrm.ir/">Ravesh Form Builder</a></b> In wordpress
*/


$RaveshFormIsCRM='false';
$RaveshFormIsFormican='false';

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


    function replaceShortCode($atts)
    {
        $isCRM=$GLOBALS['RaveshFormIsCRM'];
        $isFormican=$GLOBALS['RaveshFormIsFormican'];
        $comment="";
        
        extract(shortcode_atts(array(
            "server" => 'http://',
            "domain" => '',
            "secretcode" => '',
            "formid" => '0',
            "type" => 'inline',
            "title" => 'View Form'
        ), $atts));

        if ($isCRM=="true"){
          if (substr($server, -1) != "/") $server = $server . "/";
          $comment="RAVESH FORM BUILDER ---- RAVESHCRM.IR";
        }else{
          if ($isFormican=="true") {
            $server = "http://Formican.com/";
            $comment="FORMICAN FORM BUILDER ---- FORMICAN.COM";
          }else{
            $server = "http://FormAfzar.com/";
            $comment="FORMAFZAR FORM BUILDER ---- FORMAFZAR.COM";
          }
          $domain=$secretcode;
        }
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
        $result = "\n<!--START---- $comment ----->\n" . $result . "\n<!--END--- $comment ----->\n";

        return $result;
    }

    add_shortcode('RaveshForm', 'replaceShortCode');
    add_shortcode('FormAfzar', 'replaceShortCode');
    add_shortcode('Formican', 'replaceShortCode');
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

        $language=get_locale();
        $iconUrl=plugins_url('/', __FILE__ );
        $isCRM=$GLOBALS['RaveshFormIsCRM'];
        $isFormican=$GLOBALS['RaveshFormIsFormican'];
        echo "<script type='text/javascript'>var RaveshFormPath='$iconUrl';var RaveshFormLang='$language';var RaveshFormIsCRM='$isCRM';var RaveshFormIsFormican='$isFormican'</script>";


         $plugin_array['my_mce_button'] =plugins_url( 'RaveshForm_mce_button.js', __FILE__ );
        return $plugin_array;
    }

    function register_ravesh_mce_button($buttons)
    {
        array_push($buttons, 'my_mce_button');
        return $buttons;
    }
}
?>