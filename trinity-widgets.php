<?php

/*
Plugin Name: Trinity Widgets
Plugin URI: 
Description: Custom widget to output Sunday's information
Author: 
Version: 2.0
Author URI:
*/

class this_sunday extends WP_Widget {

// constructor
function __construct() {
// Give widget name here
parent::__construct(false, $name = __('This Sunday', 'wp_widget_plugin') );

}

// widget form creation

function form($instance) {

// Check values
if( $instance) {
$ts_date = esc_attr($instance['ts_date']);
$ts_title = esc_attr($instance['ts_title']);
$ts_descarea = $instance['ts_descarea'];
$ts_readings = $instance['ts_readings'];
} else {
$ts_date = ' ';
$ts_title = ' ';
$ts_descarea = ' ';
$ts_readings = ' ';

}
?>

<p>
<label for="<?php echo $this->get_field_id('ts_date'); ?>"><?php _e('Sundays Date', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_date'); ?>" name="<?php echo $this->get_field_name('ts_date'); ?>" type="text" value="<?php echo $ts_date; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_title'); ?>"><?php _e('Sundays Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_title'); ?>" name="<?php echo $this->get_field_name('ts_title'); ?>" type="text" value="<?php echo $ts_title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_descarea'); ?>"><?php _e('Sundays Description:', 'wp_widget_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('ts_descarea'); ?>" name="<?php echo $this->get_field_name('ts_descarea'); ?>" rows="7" cols="20" >
<?php echo $ts_descarea; ?>
</textarea>
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_readings'); ?>"><?php _e('Readings', 'wp_widget_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('ts_readings'); ?>" name="<?php echo $this->get_field_name('ts_readings'); ?>" rows="5" cols="20" >
<?php echo $ts_readings; ?>
</textarea>
</p>
<?php
}


function update($new_instance, $old_instance) {
$instance = $old_instance;
// Fields
$instance['ts_date'] = strip_tags($new_instance['ts_date']);
$instance['ts_title'] = strip_tags($new_instance['ts_title']);
$instance['ts_descarea'] = $new_instance['ts_descarea'];
$instance['ts_readings'] = $new_instance['ts_readings'];

return $instance;
}


// display widget
function widget($args, $instance) {
extract( $args );

// these are the widget options
$ts_date = esc_attr($instance['ts_date']);
$ts_title = esc_attr($instance['ts_title']);
$ts_descarea = $instance['ts_descarea'];
$ts_link = esc_attr($instance['ts_link']);
$ts_readings = esc_attr($instance['ts_readings']);

echo $before_widget;
// Display the widget
?>
<section class="sunday_box">
	<div class="sunday_box_content ">
		<h3>This Sunday</h3>
		<center style="font-size: 1.5em;line-height: 1.8em;"><?php echo $ts_date; ?></center>
		<center style="font-size: 1.0em;padding-bottom: 5px;"><?php echo $ts_title; ?></center>
		<p><?php echo $ts_descarea; ?></p>
		<?php $ts_readings = str_replace(".", "", $ts_readings); ?>
		<span class="text">
			<strong>Readings:</strong> (click readings to view)<br>
			<a href="<?php	echo 'http://bible.oremus.org/?vnum=yes&version=nrsv&passage=%0a' . 
				str_replace(";","%0a",$ts_readings) . '" target="_blank">' . 
				str_replace(";","<br>", $ts_readings) ;  ?>
			</a>
		</span>
	</div>
	<br>
</section>
<?php

echo $after_widget;

}
} //End Class extension to Widget

// register widget
add_action('widgets_init', create_function('', 'return register_widget("this_sunday");'));
