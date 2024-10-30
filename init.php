<?php
/*
Plugin Name: Body mass index widget
Plugin URI: http://www.todoestetica.com/
Description: Widget that calculates body mass index
Version: 1.1
Author: Todoestetica.com
Author URI: http://www.todoestetica.com

Copyright 2011  Todoestetica

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
*/


function bmi_head() {
	
	//wp_register_script('myScript', WP_PLUGIN_URL . '/myScript/myScript.bundle.js', array('jquery') );
			//wp_register_script('myscript', '/wp-content/plugins/body-mass-index-calculator/js/bmi_calculator.js');
			$site_url = get_option( 'siteurl' );
			echo '<script type="text/javascript" src="'.$site_url.'/wp-content/plugins/body-mass-index-calculator/js/bmi_calculator.js"></script>';
}


class wp_bmi extends WP_Widget {
	function wp_bmi() {
		$widget_ops = array('classname' => 'wp_bmi', 'description' => 'Widgets that calculates body mass index.' );
		$this->WP_Widget('wp_bmi', 'Body mass calculator', $widget_ops);
	}
	function widget($args, $instance) {
		$site_url = get_option( 'siteurl' );
			
			echo $before_widget;
			$widget_title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
			
			echo $before_title . '<h2>' . $widget_title . '</h2>' . $after_title;
			
			echo '
			<br/>
			<table> 
			<tr><td>Height CM:</td><td>
	 <input type="text" name="height_bmi" id="height_bmi" size="3"/>
  </td>
  </tr>
<tr>
  <td>Weight KG:</td><td>
   <input type="text" name="weight_bmi" id="weight_bmi" size="3"/>
  <td/>
  </tr>
  
  <tr align="center">
  <td colspan="2"><br/>
    <input type="submit" name="CALCULATE" id="CALCULATE" value="CALCULATE BMI" onclick="bmi_calcule()"/>
  </td>
  </tr>
  
  <tr align="center">
 
   <td colspan="2"><br/>Body mass index =
   <input type="text" name="result_bmi" id="result_bmi" size="5" readonly="readonly"/>
  </td>
  </tr>
	</table>

 <div id="cons_bmi"></div>
 <br/>

 <a href="http://www.todoestetica.com" title="Cirugia estetica"><img src="'.$site_url.'/wp-content/plugins/body-mass-index-calculator/bmi.png"></a>
';
			
			
			
			echo $after_widget;
		
	}
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = strip_tags($instance['title']);
		
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			
				
<?php
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("wp_bmi");') );
add_action('wp_head', 'bmi_head');

?>
