<?php
/*
Plugin Name: Socially
Description: Social Bookmarking Widget 
Version: 3.0
Author: Teja Amilineni
*/

// Start class socially_widget //

class socially_widget extends WP_Widget {

// Constructor //

	function socially_widget() {
		$widget_ops = array( 'classname' => 'socially_widget', 'description' => 'Social Bookmarking!' ); // Widget Settings
		$control_ops = array( 'id_base' => 'socially_widget' ); // Widget Control Settings
		$this->WP_Widget( 'socially_widget', 'Socially Widget', $widget_ops, $control_ops ); // Create the widget
	}

// Extract Args //

		function widget($args, $instance) {
			extract( $args );

			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			$fbid		= $instance['fbid']; // facebook username
			$twtid 		= $instance['twtid']; // twitter username
			$suid		= $instance['suid']; // stumbleupon username
			$diggid 	= $instance['diggid']; // digg username
			$ytbid		= $instance['ytbid']; // youtube username
			
// Before widget //

			echo $before_widget;

	// Title of widget //

			if ( $title ) { echo $before_title . $title . $after_title; }

	// Widget output //

         if ($fbid) { ?>

	 <a title="Follow <?php bloginfo('name') ?> on Facebook" href="http://www.facebook.com/<?php echo $fbid; ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/fb.png" alt="Follow <?php bloginfo('name') ?> on Facebook" width="48px" height="48px" />
				</a> <?php } 

		if ($twtid) {	?>

	<a title="Follow <?php bloginfo('name') ?> on Twitter" href="http://twitter.com/<?php echo $twtid; ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/twt.png" alt="Follow <?php bloginfo('name') ?> on Twitter" width="48px" height="48px" />
				</a> <?php } 
		if ($suid) {	?>

	<a title="Follow <?php bloginfo('name') ?> on StumbleUpon" href="http://stumbleupon.com/<?php echo $suid; ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/su.png" alt="Follow <?php bloginfo('name') ?> on StumbleUpon" width="48px" height="48px" />
				</a> <?php }
		if ($diggid) {	?>

	<a title="Follow <?php bloginfo('name') ?> on Digg" href="http://digg.com/<?php echo $diggid; ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/digg.png" alt="Follow <?php bloginfo('name') ?> on Digg" width="48px" height="48px" />
				</a> <?php }

		if ($ytbid) {	?>

	<a title="Follow <?php bloginfo('name') ?> on YouTube" href="http://youtube.com/<?php echo $ytbid; ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/youtube.png" alt="Follow <?php bloginfo('name') ?> on YouTube" width="48px" height="48px" />
				</a> <?php } ?>	

	<a title="Subscribe to <?php bloginfo('name') ?>" href="<?php bloginfo('rss2_url') ?>" target="_blank">
					<img style="vertical-align: middle; margin: 0 10px 10px 0;" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/socially-social-bookmarking-widget/icons/rss.png" alt="Subscribe to <?php bloginfo('name') ?>" width="48px" height="48px" />
				</a>
	
<?php			

	// After widget //

			echo $after_widget;
		} 


// Update Settings //

 		function update($new_instance, $old_instance) {
 			$instance['title'] = strip_tags($new_instance['title']);
 			$instance['fbid'] = strip_tags($new_instance['fbid']);
 			$instance['twtid'] = strip_tags($new_instance['twtid']);
 			$instance['suid'] = strip_tags($new_instance['suid']);
 			$instance['diggid'] = strip_tags($new_instance['diggid']);
 			$instance['ytbid'] = strip_tags($new_instance['ytbid']);
			return $instance;
 		}



// Widget Control Panel //

 function form($instance) {

 $defaults = array( 'title' => 'Socially!' );
 		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
  <?php echo "<br/><br/><b>To stop showing an icon, leave the text field blank</b>" ; ?>
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('fbid'); ?>"><?php _e('Your Facebook Username'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('fbid'); ?>" name="<?php echo $this->get_field_name('fbid'); ?>" type="text" value="<?php echo $instance['fbid']; ?>" />
 		</p>

		<p>
 			<label for="<?php echo $this->get_field_id('twtid'); ?>"><?php _e('Your Twitter Username'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('twtid'); ?>" name="<?php echo $this->get_field_name('twtid'); ?>" type="text" value="<?php echo $instance['twtid']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('suid'); ?>"><?php _e('Your StumbleUpon Username'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('suid'); ?>" name="<?php echo $this->get_field_name('suid'); ?>" type="text" value="<?php echo $instance['suid']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('diggid'); ?>"><?php _e('Your Digg Username'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('diggid'); ?>" name="<?php echo $this->get_field_name('diggid'); ?>" type="text" value="<?php echo $instance['diggid']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('ytbid'); ?>"><?php _e('Your Youtube Username'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('ytbid'); ?>" name="<?php echo $this->get_field_name('ytbid'); ?>" type="text" value="<?php echo $instance['ytbid']; ?>" />
 		</p>

        <?php }

}

// End class socially_widget

	add_action('widgets_init', create_function('', 'return register_widget("socially_widget");'));	

?>
