<?php 
/**
 * Adds Instush_Widget widget.
 */

add_action('widgets_init', create_function('', 'return register_widget("Instush_Widget");'));

class Instush_Widget extends WP_Widget {
  /**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'instush_widget', // Base ID
			'Instush - Instagram feed Gallery', // Name
			array( 'description' => __( 'A Instush Widget', 'text_domain' ), ) // Args
		);
		
		// Add Scripts and Stylesheets
		if ( is_active_widget( false, false, $this->id_base, true ) )  
		{
			  // Enqueue the JS and styles for the backend.    
			add_action('wp_enqueue_scripts', 'instush_scripts');
			function instush_scripts() {
			  wp_register_script( 'insta-js', get_stylesheet_directory_uri() . '/library/js/instagramLite.js', array( 'jquery' ), '', true );   
			  wp_enqueue_script('insta-js');
			}

		}
	}
	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$instush_client_id = apply_filters( 'instush_client_id', $instance['instush_client_id'] );
		$instush_username = apply_filters( 'instush_username', $instance['instush_username'] );
		$limit_items = apply_filters( 'limit_items', $instance['limit_items'] );
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
		
		        <div class="wrap-instush">
			<!--<h3 class="center caps">Instagram feed Gallery</h3>  -->
			<ul class="instush-list instush_<?php echo $this->id; ?>"></ul> 
			<div class="load-more clearfix center">  
			  <button class="more-<?php echo $this->id; ?> load-more-btn btn btn-outline center caps"><span>load more</span></button>   
			</div> 
		        </div>  
		        <script>
		        jQuery( document ).ready(function() {  
			jQuery('.instush_<?php echo $this->id; ?>').instagramLite({
			    clientID: '<?php echo $instush_client_id; ?>',
			    username: '<?php echo $instush_username; ?>',
			    limit:<?php echo $limit_items; ?>,
			    urls: true,
			    videos: false, 
			    captions: false,
			    likes: true,
			    comments_count: true,
			    load_more: ".more-<?php echo $this->id; ?>"
			});
		        });  


		        jQuery(document).ready(function(){
			jQuery('.more-<?php echo $this->id; ?>').on('click', loadBar)

			function loadBar(){
			  jQuery('.more-<?php echo $this->id; ?>').contents().after('<span class="loading-bar gradient-animate px1"><i class="fa fa-spinner fa-spin"></i> </span>')
			  setTimeout(function(){
			    jQuery('.loading-bar').remove();
			  }, 800);
			}

		        });  
		        </script>
		
		<?php
		echo $after_widget;
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['instush_client_id'] = strip_tags( $new_instance['instush_client_id'] );
		$instance['instush_username'] = strip_tags( $new_instance['instush_username'] );
		$instance['limit_items'] = strip_tags( $new_instance['limit_items'] );
		return $instance;
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Widget Title
		if ( isset( $instance[ 'title' ] ) ) {$title = $instance[ 'title' ];}
		else {$title = __( 'New title', 'text_domain' );}
		
		// Client ID
		if ( isset( $instance[ 'instush_client_id' ] ) ) {$instush_client_id = $instance[ 'instush_client_id' ];}
		else {$instush_client_id = __( 'New client id', 'text_domain' );}		
		
		// Instagram User Name
		if ( isset( $instance[ 'instush_username' ] ) ) {$instush_username = $instance[ 'instush_username' ];}
		else {$instush_username = __( 'New User Name', 'text_domain' );}	
		
		// Limit Number of items
		if ( isset( $instance[ 'limit_items' ] ) ) {$limit_items = $instance[ 'limit_items' ];}
		else {$limit_items = __( '4', 'text_domain' );}	
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:' ); ?></strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>	
		
		<p>
		<label for="<?php echo $this->get_field_id( 'instush_client_id' ); ?>"><strong><?php _e( 'Client ID:' ); ?></strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'instush_client_id' ); ?>" name="<?php echo $this->get_field_name( 'instush_client_id' ); ?>" type="text" value="<?php echo esc_attr( $instush_client_id ); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'instush_username' ); ?>"><strong><?php _e( 'Username:' ); ?></strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'instush_username' ); ?>" name="<?php echo $this->get_field_name( 'instush_username' ); ?>" type="text" value="<?php echo esc_attr( $instush_username ); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'limit_items' ); ?>"><strong><?php _e( 'Limit number of items (Default: 4):' ); ?></strong></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'limit_items' ); ?>" name="<?php echo $this->get_field_name( 'limit_items' ); ?>" type="text" value="<?php echo esc_attr( $limit_items ); ?>" />
		</p>
		<?php
	}
} // class Instush_Widget
