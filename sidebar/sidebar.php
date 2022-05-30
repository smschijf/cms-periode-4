<?php
/**
* Plugin Name: Sidebar
* Plugin URI: gluwebURL
* Description: Vertel hier iets over de werking van je plugin.
Version: 1.0.0
Author: Sander Schijf
Author URI: gluwebURL
License: GPL-2.0+
*/

add_action('widgets_init','load_sidebar_widget');
function load_sidebar_widget(){
   register_widget('sidebar_widget');
}

class sidebar_widget extends WP_Widget {
  function __construct() {
    parent::__construct(
      'sidebar_widget',  // Widget ID
      __('Sidebar Widget', 'sidebar_widget_domain'),   // Naam van de widget,
      array( 'description' => __('Informatie in sidebar','sidebar_widget_domain'),) // Widget omschrijving
    );
  }
  public function widget($args, $instance){
    $htmlcontent = 'OK';
    echo __($htmlcontent,'sidebar_widget_domain');
  }
 }