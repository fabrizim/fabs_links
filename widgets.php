<?php
/**
 * Fabs Player Widget
 *
 */
class Fabs_Links_Widget extends WP_Widget {

	function Fabs_Links_Widget() {
		$widget_ops = array('classname' => 'widget_fabs_links', 'description' => __( "Fabs Links Widget") );
		$this->WP_Widget('fabs_links', __('Fabs Links'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
            
        // show the links
        ?>
        <div class="fabs-links">
            <?php
            wp_list_bookmarks('title_li=&category_before=<div class="category">&category_after=</div></div>&title_before=<h2><a>&title_after=</a></h2><div class="links">');
            ?>
        </div>
        <?php
		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = @$instance['title'];
        ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>
        <?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}


add_action('widgets_init', 'fabs_links_widgets_init');
function fabs_links_widgets_init(){
    register_widget('Fabs_Links_Widget');
}