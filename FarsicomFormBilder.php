<?php
/* 
Plugin Name: Farsicom Form builder
Plugin URI: farsicom.com
Version: v1.0
Author: <a href="http://Farsicom.com/">farsicom</a> 
Description: A sample plugin for a <a href="http://farsicom.com/"> Conect to crm and show form in Wordpress
*/


// بررسی وجود نداشتن پلاگین
if (!class_exists("CrmPluginSeries")) {
    class CrmPluginSeries {
        function CrmPluginSeries() { 
			

        }
     
    }
 
} //End Class CrmPluginSeries


			
//بررسی وجود داشتن پلاگین
if (class_exists("CrmPluginSeries")) {
    $dl_pluginSeries = new CrmPluginSeries();
	
	/*//اضافه شدن منو به لیست منو
		 add_action('admin_menu', 'test_plugin_setup_menu');

		function test_plugin_setup_menu(){
		add_menu_page( 'Farsicom Plugin Page', 'مدیریت پلاگین فارسیکام', 'manage_options', 'Farsicom-plugin', 'Farsicom_init' );
		}

		function Farsicom_init(){
		echo "<h1>متن صفحه </h1>";
		 
		}*/
		
		
			
}


   

//Actions and Filters   
if (isset($dl_pluginSeries)) {
    //Actions
	include('FarsicomFormSetting.php');	

	
    //Filters
	
		//اضافه کردن شورت کی های مورد نظر
		 function my_url( $atts ) {
			
			//کد های دانلود کردن فرم و نمایش آن
			
			// code
			 extract(shortcode_atts(array(
					"href" => 'http://'
				), $atts));
				return '<a href="'.$href.'">'.content.'</a>';
		}
		add_shortcode( 'RaveshForm', 'my_url' );

		  
		  
		  //اضافه کردن دکمه در ادیتور
		// Hooks your functions into the correct filters
		function my_add_mce_button() {
		 // check user permissions
		 if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		 return;
		 }
		 // check if WYSIWYG is enabled
		 if ( 'true' == get_user_option( 'rich_editing' ) ) {
			 add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
			 add_filter( 'mce_buttons', 'my_register_mce_button' );
		 }
		}
		add_action('admin_head', 'my_add_mce_button');
		 
		// Declare script for new button
		function my_add_tinymce_plugin( $plugin_array ) {
		 $plugin_array['my_mce_button'] = plugin_dir_url('Farsicom-buttons.js')  . 'Farsicom.Form.Bilder/Farsicom-buttons.js';
		 return $plugin_array;
		}
		 
		// Register new button in the editor
		function my_register_mce_button( $buttons ) {
		 array_push( $buttons, 'my_mce_button' );
		 return $buttons;
		}
}
 
?>