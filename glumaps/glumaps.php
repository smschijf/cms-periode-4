<?php

/**
 * Plugin Name: glumaps
 * Plugin URI: u210578.gluweb.nl
 * Description: Vertel hier iets over de werking van je plugin.
Version: 1.0.0
Author: Sander Schijf
Author URI: u210578.gluweb.nl
License: GPL-2.0+
 */

add_action('widgets_init', 'load_glumap_widget');
function load_glumap_widget()
{
  register_widget('glumap_widget');
}

class glumap_widget extends WP_Widget
{
  function __construct()
  {
    parent::__construct(
      'glumap_widget',  // Widget ID
      __('Grafisch Lyceum Utrecht Maps Widget', 'glumap_widget_domain'),   // Naam van de widget,
      array('description' => __('Google Maps locatie van het Grafisch Lyceum Utrecht', 'glumap_widget_domain'),) // Widget omschrijving
    );
  }
  public function widget($args, $instance)
  {
    $htmlcontent = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d613.0421163076124!2d5.106467907892973!3d52.076663068050486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6658b39d11917%3A0xc4aaed9051c276c!2sGrafisch%20Lyceum%20Utrecht!5e0!3m2!1snl!2snl!4v1622037390952!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';

    $title = apply_filters('glumap_widget', $instance['title']);

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    echo __($htmlcontent, 'wpb_widget_domain');
    echo $args['after_widget'];
    echo '<div class="infobox">' . get_option('footer_text') . '</div>';

    global $wpdb; // Deze variabele moet je toevoegen.
    $query = $wpdb->get_results("SELECT MAX(user_registered) AS user_registered FROM wp_users");
    foreach ($query as $row) {
      echo $row->user_registered . '<br>'; // Via het pijltje ->  kun je de field/kolommen gebruiken.
    }
  }

  public function form($instance)
  {
    if (isset($instance['title'])) {
      $title = $instance['title'];
    } else {
      $title = __('New title', 'wpb_widget_domain');
    }
    // Widget admin form
?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
<?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    return $instance;
  }
}
