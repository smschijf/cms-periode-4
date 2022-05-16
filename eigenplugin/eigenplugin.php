<?php

/**
 * Plugin Name: Mijn eigen plugin
 * Plugin URI: gluwebURL
 * Description: Vertel hier iets over de werking van je plugin.
Version: 1.0.0
Author: Sander Schijf
Author URI: u210578.gluweb.nl
License: GPL-2.0+
 */

// Voeg html toe onderin de pagina.
add_action('wp_footer', 'mybox');
function mybox()
{
  echo '<div class="infobox">' . get_option('footer_text') . '</div>';
}

add_action('wp_body_open', 'headerbox');
function headerbox()
{
  echo '<div class="infobox">' . get_option('header_text') . '</div>';
}

// Voeg styling toe in de <head>.
add_action('wp_enqueue_scripts', 'mystyles');
function mystyles()
{
  wp_register_style('eigenplugin', plugins_url('eigenplugin/eigenplugin.css'));
  wp_enqueue_style('eigenplugin');
  //   echo '<style>
  //   .infobox{
  //      background-color:black;
  //    width:100%;
  //    height:54px;
  //    color:white;
  //    display:flex;
  //    justify-content:center;
  //    align-items:center;
  //  }
  //  </style>';
}


add_action('admin_menu', 'mijnplugin_menu');
function mijnplugin_menu()
{
  add_menu_page('Wijzig tekst', 'Eigen plugin', 'manage_options', 'eigenplugin_settings_page', 'mijnplugin_page');
}
function mijnplugin_page()
{
  echo '<h2>' . __('Footer Instellingen', 'menu-test') . '</h2>';
  include_once('eigenplugin_settings_page.php');
}
