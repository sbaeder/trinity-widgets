<?php

/*
Plugin Name: Trinity Widgets
Plugin URI: 
Description: Custom widget to output Sunday's information
Author: 
Version: 1
Author URI:
*/

class this_sunday_tng extends WP_Widget {

// constructor
function __construct() {
// Give widget name here
parent::__construct(false, $name = __('This Sunday - TNG', 'wp_widget_plugin') );

}

// widget form creation

function form($instance) {

// Check values
if( $instance) {
$ts_tng_date = esc_attr($instance['ts_tng_date']);
$ts_tng_title = esc_attr($instance['ts_tng_title']);
$ts_tng_descarea = $instance['ts_tng_descarea'];
$ts_tng_reading1 = esc_attr($instance['ts_tng_reading1']);
$ts_tng_reading2 = esc_attr($instance['ts_tng_reading2']);
$ts_tng_reading3 = esc_attr($instance['ts_tng_reading3']);
$ts_tng_reading4 = esc_attr($instance['ts_tng_reading4']);
} else {
$ts_tng_date = ' ';
$ts_tng_title = ' ';
$ts_tng_descarea = ' ';
$ts_tng_reading1 = ' ';
$ts_tng_reading2 = ' ';
$ts_tng_reading3 = ' ';
$ts_tng_reading4 = ' ';
}
?>

<p>
<label for="<?php echo $this->get_field_id('ts_tng_date'); ?>"><?php _e('Sundays Date', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_date'); ?>" name="<?php echo $this->get_field_name('ts_tng_date'); ?>" type="text" value="<?php echo $ts_tng_date; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_tng_title'); ?>"><?php _e('Sundays Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_title'); ?>" name="<?php echo $this->get_field_name('ts_tng_title'); ?>" type="text" value="<?php echo $ts_tng_title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_tng_descarea'); ?>"><?php _e('Sundays Description:', 'wp_widget_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('ts_tng_descarea'); ?>" name="<?php echo $this->get_field_name('ts_tng_descarea'); ?>" rows="7" cols="20" >
<?php echo $ts_tng_descarea; ?>
</textarea>
</p>
<p>
<!--
<label for="<?php echo $this->get_field_id('ts_tng_link'); ?>"><?php _e('Link to readings - <font color="red">NOTE: A "#" character will automatically generate individual links based on the refereces entered below)</font>', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_link'); ?>" name="<?php echo $this->get_field_name('ts_tng_link'); ?>" type="text" value="<?php echo $ts_tng_link; ?>" />
</p>
-->
<p>
<label for="<?php echo $this->get_field_id('ts_tng_reading1'); ?>"><?php _e('Reading #1', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_reading1'); ?>" name="<?php echo $this->get_field_name('ts_tng_reading1'); ?>" type="text" value="<?php echo $ts_tng_reading1; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_tng_reading2'); ?>"><?php _e('Reading #2', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_reading2'); ?>" name="<?php echo $this->get_field_name('ts_tng_reading2'); ?>" type="text" value="<?php echo $ts_tng_reading2; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_tng_reading3'); ?>"><?php _e('Reading #3', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_reading3'); ?>" name="<?php echo $this->get_field_name('ts_tng_reading3'); ?>" type="text" value="<?php echo $ts_tng_reading3; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('ts_tng_reading4'); ?>"><?php _e('Reading #4', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('ts_tng_reading4'); ?>" name="<?php echo $this->get_field_name('ts_tng_reading4'); ?>" type="text" value="<?php echo $ts_tng_reading4; ?>" />
</p>
<?php
}


function update($new_instance, $old_instance) {
$instance = $old_instance;
// Fields
$instance['ts_tng_date'] = strip_tags($new_instance['ts_tng_date']);
$instance['ts_tng_title'] = strip_tags($new_instance['ts_tng_title']);
// Don't strip these tags in case we want to add additional HTML Stuff here!
$instance['ts_tng_descarea'] = $new_instance['ts_tng_descarea'];
$instance['ts_tng_reading1'] = strip_tags($new_instance['ts_tng_reading1']);
$instance['ts_tng_reading2'] = strip_tags($new_instance['ts_tng_reading2']);
$instance['ts_tng_reading3'] = strip_tags($new_instance['ts_tng_reading3']);
$instance['ts_tng_reading4'] = strip_tags($new_instance['ts_tng_reading4']);
return $instance;
}


// display widget
function widget($args, $instance) {
extract( $args );

// these are the widget options
$ts_tng_date = esc_attr($instance['ts_tng_date']);
$ts_tng_title = esc_attr($instance['ts_tng_title']);
$ts_tng_descarea = $instance['ts_tng_descarea'];
$ts_tng_link = esc_attr($instance['ts_tng_link']);
$ts_tng_reading1 = esc_attr($instance['ts_tng_reading1']);
$ts_tng_reading2 = esc_attr($instance['ts_tng_reading2']);
$ts_tng_reading3 = esc_attr($instance['ts_tng_reading3']);
$ts_tng_reading4 = esc_attr($instance['ts_tng_reading4']);

echo $before_widget;
// Display the widget
?>
<section class="sunday_box">
<div class="sunday_box_contant ">
<h3>This Sunday</h3>
<center><?php echo $ts_tng_date; ?></center>
<center><?php echo $ts_tng_title; ?></center>
<br>
<p><?php echo $ts_tng_descarea; ?></p>
<br/>
<span class="text"><strong>Readings:</strong> (click readings to view)<br>

<a href="<?php
	echo 'http://bible.oremus.org/?vnum=yes&version=nrsv&passage=%0a' . $ts_tng_reading1 .
		'%0a' . $ts_tng_reading2 .'%0a' .  $ts_tng_reading3 .'%0a' . $ts_tng_reading4 ;
?>" target="_blank">
<?php echo $ts_tng_reading1 . "<br>" . $ts_tng_reading2 . "<br>" . $ts_tng_reading3 . "<br>" . $ts_tng_reading4; ?></a>

</span>
</div>

<br>
<div class="view_calendar btn_red"> <a href="<?php echo get_page_link(2); ?>">View Our Calendar</a> </div>
</section>
&nbsp;<br>
<?php

echo $after_widget;

}
} //End Class extension to Widget


class vimeo_tng extends WP_Widget {

// constructor
function __construct() {
// Give widget name here
parent::__construct(false, $name = __('Vimeo - TNG', 'wp_widget_plugin') );
}

// widget form creation

function form($instance) {

// Check values
if( $instance) {
$vimeo_tng_date = esc_attr($instance['vimeo_tng_date']);
$vimeo_tng_link = esc_attr($instance['vimeo_tng_link']);
} else {
$vimeo_tng_date = ' ';
$vimeo_tng_link = ' ';
}
?>

<p>
<label for="<?php echo $this->get_field_id('vimeo_tng_date'); ?>"><?php _e('Vimeo Title (text)', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('vimeo_tng_date'); ?>" name="<?php echo $this->get_field_name('vimeo_tng_date'); ?>" type="text" value="<?php echo $vimeo_tng_date; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('vimeo_tng_link'); ?>"><?php _e('Vimeo File number', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('vimeo_tng_link'); ?>" name="<?php echo $this->get_field_name('vimeo_tng_link'); ?>" type="text" value="<?php echo $vimeo_tng_link; ?>" />
</p>

<?php
}


function update($new_instance, $old_instance) {
$instance = $old_instance;
// Fields
$instance['vimeo_tng_date'] = strip_tags($new_instance['vimeo_tng_date']);
$instance['vimeo_tng_link'] = strip_tags($new_instance['vimeo_tng_link']);
return $instance;
}

// display widget
function widget($args, $instance) {
extract( $args );

// these are the widget options
$vimeo_tng_date = esc_attr($instance['vimeo_tng_date']);
$vimeo_tng_link = esc_attr($instance['vimeo_tng_link']);

echo $before_widget;
// Display the widget
?>
<div class="video_box">
<iframe src="//player.vimeo.com/video/<?php echo $vimeo_tng_link; ?>" width="WIDTH" height="HEIGHT" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p>
<a href="http://vimeo.com/<?php echo $vimeo_tng_link; ?>"><?php echo $vimeo_tng_date; ?></a> from <a href="http://vimeo.com/trinityworcester">Trinity Lutheran Worcester</a> on <a href="http://vimeo.com">Vimeo</a>.</p></a> 
<br/>
</div>

<?php

echo $after_widget;

}
} //End Class extension to Widget

// register widget
add_action('widgets_init', create_function('', 'return register_widget("this_sunday_tng");'));
add_action('widgets_init', create_function('', 'return register_widget("vimeo_tng");'));
