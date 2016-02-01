<?php


// No direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	die( "You can't access this file directly." );
}

/**
 * Load a plugin's translated strings.
 *
 */

add_action( 'plugins_loaded', 'trento_image_widget_translations' );
function trento_image_widget_translations() {
	load_plugin_textdomain( 'image-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Retrieve all image sizes.
 *
 */

function get_image_sizes( $size = '' ) {

	global $_wp_additional_image_sizes;

	$sizes = array();
	$get_intermediate_image_sizes = get_intermediate_image_sizes();

	// Create the full array with sizes and crop info.
	foreach( $get_intermediate_image_sizes as $_size ) {

		if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

			$sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
			$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
			$sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

			$sizes[ $_size ] = array(
				'width' => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
			);

		}

	}

	// Get only 1 size if found.
	if ( $size ) {

		if( isset( $sizes[ $size ] ) ) {

			return $sizes[ $size ];

		} else {

			return false;

		}

	}

	return $sizes;
}


/**
 * Widget Scripts for the backend.
 *
 */

function trento_image_widget_scripts(){

	wp_enqueue_media();
	wp_enqueue_script( 'jquery-ui-sortable' );

	$args = array(
		'frame_title' => __( 'Select an Image', 'image-widget' ),
		'button_title' => __( 'Use this Image', 'image-widget' ),
	);

        wp_enqueue_script('widget-image-js', get_stylesheet_directory_uri() . '/library/js/upload-media.js', array('jquery'));
	
	wp_localize_script( 'widget-image-js', 'TrentoImageWidget', $args );
	
	


}

/**
 * Create our Image Widget.
 */

class trento_Image_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'trento_Image', // Base ID
			__( 'Trento - Image widget', 'image-widget' ), // Name
			array(
				'description' => __( 'A widget that displays an image with title, description and a button.', 'image-widget' ),
			)
		);

		// Enqueue the JS and styles for the backend.
		add_action( 'admin_enqueue_scripts', 'trento_image_widget_scripts', 99 );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		// Enqueue the front-end stylesheet.

		$sort = ! empty( $instance['sort'] ) ? esc_attr($instance['sort']) : '';
		$image = ! empty( $instance['image'] ) ? esc_attr($instance['image']) : '';
		$title = ! empty( $instance['title'] ) ? esc_attr($instance['title']) : '';
		$alt = ! empty( $instance['alt'] ) ? esc_attr($instance['alt']) : '';
		$url = ! empty( $instance['url'] ) ? esc_attr($instance['url']) : '';
		$button = ! empty( $instance['button'] ) ? esc_attr($instance['button']) : '';
		$size = ! empty( $instance['size'] ) ? esc_attr($instance['size']) : '';
		$widget_id = ! empty( $args['widget_id'] ) ? esc_attr($args['widget_id']) : '';

		// Begin the widget.
		echo $args['before_widget'];

		// Find the order of our widget fields.
		if ( ! empty( $sort ) ) {
			$fields = explode(',',$sort);
		} else {
			$fields = array('no-sort');
		}

		// Get the title.
		if ( ! empty( $title ) ) {

			echo $args['before_title'];
			echo apply_filters( 'widget_title', $instance['title'] );
			echo $args['after_title'];

		}

		foreach ( $fields as $field ) {

			// The image.
			if ( $field == $widget_id . '-image' && ! empty( $image ) || $field == 'no-sort' && ! empty( $image ) ) :

				// Grab the image and make an array with url and id.
				$image = explode('?id=', $image);

				echo '<div class="trento_widget_image-field trento_widget_image-image">';

				// Begin the link.
				if ( ! empty( $url ) ) {
					echo '<a href="' . $url . '">';
				}
			
		

			
echo $main_image = wp_get_attachment_image( $image[1], $size, false, array('alt'=>$alt) );


			
			
				// End the link.
				if ( ! empty( $url ) ) {
					echo '</a>';
				}

				echo '</div>';

			endif;


			// Button.
			if ( $field == $widget_id . '-button' && ! empty( $url ) && ! empty( $button ) || $field === 'no-sort' && ! empty( $url ) && ! empty( $button ) ) :

				echo '<p class="trento_widget_image-field trento_widget_image-button"><a class="button btn" href="' . $url . '">' . $button . '</a></p>';

			endif;

		}


		// End the widget.
		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$sort = ! empty( $instance['sort'] ) ? esc_attr($instance['sort']) : '';
		$image = ! empty( $instance['image'] ) ? esc_attr($instance['image']) : '';
		$title = ! empty( $instance['title'] ) ? esc_attr($instance['title']) : '';
		$alt = ! empty( $instance['alt'] ) ? esc_attr($instance['alt']) : '';
		$url = ! empty( $instance['url'] ) ? esc_attr($instance['url']) : '';
		$button = ! empty( $instance['button'] ) ? esc_attr($instance['button']) : '';
		$size = ! empty( $instance['size'] ) ? esc_attr($instance['size']) : '';

		// Make the order array.
		if ( ! empty( $sort ) ) {
			$fields = explode(',',$sort);
		} else {
			$fields = array(
				'no-order'
			);
		}

		// Hide the image.
		if ( $image != '' ) {
			$imageoptions = 'style="display:block;"';
		} else {
			$imageoptions = 'style="display:none;"';
		}

		?>

		<p id="<?php echo $this->id . '-title'; ?>">
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'image-widget' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
				<small><?php _e( 'Give the widget a title (If you need one)', 'image-widget' ); ?>.</small>
			</label>
		</p>

		<div class="widget-image-sortable">

		<?php foreach ( $fields as $field ) { ?>

			<?php if ( $field == $this->id . '-image' || $field === 'no-order' ) : ?>
				<p id="<?php echo $this->id . '-image'; ?>">
				<label for="select-image"><?php _e( 'Select image', 'image-widget' ); ?>:
					<button class="widefat button widget-control-save widget-image-select" name="select-image"><?php _e( 'Select image', 'image-widget' ); ?></button>
					<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="hidden" value="<?php echo esc_attr( $image ); ?>">

					<?php
					$src = wp_get_attachment_image_src( $attachment_id, $size, $icon );
					if ( ! empty( $image ) ) {
						echo '<img class="imagePreview" src="' . esc_attr( $image ) . '">';
					} else {
						echo '<img ' . $imageoptions . ' class="imagePreview" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D">';
					}

					?>

				</label>

				<a href="#" class="imageRemove"><?php _e( 'Remove Image', 'image-widget' ); ?></a>

			</p>

			<?php endif; ?>


			<?php if ( $field == $this->id . '-button' || $field === 'no-order' ) : ?>

			<p id="<?php echo $this->id . '-button'; ?>">
				<label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e( 'Button', 'image-widget' ); ?>:
					<input class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" type="text" value="<?php echo esc_attr( $button ); ?>">
					<small><?php _e( 'Add a text that will be displayed in the button', 'image-widget' ); ?>.</small>
				</label>
			</p>

			<?php endif; ?>

		<?php } ?>

		</div>

		<input class="widefat image-widget-sort-order" id="<?php echo $this->get_field_id( 'sort' ); ?>" name="<?php echo $this->get_field_name( 'sort' ); ?>" type="text" value="<?php echo esc_attr( $sort ); ?>">

		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Link', 'image-widget' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
				<small><?php _e( 'Add an url that the widget should refer to (Button and Image)', 'image-widget' ); ?>.</small>
			</label>
		</p>

		<div class="non-sortable" <?php echo $imageoptions; ?>>
			<h4><?php _e('Widget Options', 'image-widget' ); ?></h4>

			<label for="<?php echo $this->get_field_id( 'alt' ); ?>"><?php _e( 'Alternate Text', 'image-widget' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id( 'alt' ); ?>" name="<?php echo $this->get_field_name( 'alt' ); ?>" type="text" value="<?php echo esc_attr( $alt ); ?>">
				<small><?php _e( 'Give the image a alt tag', 'image-widget' ); ?>.</small>
			</label>



			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Image size', 'image-widget' ); ?>:
				<select class='widefat' id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>">

					<?php

					$img_sizes = get_image_sizes();

					foreach ( $img_sizes as $img_size => $image ) : ?>

						<option value="<?php echo $img_size; ?>" <?php selected( $size, $img_size, true ); ?>><?php echo $img_size; ?></option>

					<?php endforeach; ?>

				</select>
				<small><?php _e( 'Select an image size', 'image-widget' ); ?>.</small>

			</label>

		</div>

<style>
.widget-image-sortable p {
    background: #e9e9e9;
    position: relative;
    padding: 15px;
    border: 1px solid #ccc;
}

.widget-image-sortable .imageRemove {
    font-size: .75em;
}

.widget-image-sortable .imagePreview {
    display: block;
    border: 1px solid #BBBBBB;
    max-width: 100%;
    height: auto;
    margin-top: 15px;
}

.widget-image-sortable button.widget-image-select {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 0;
}

.widget-image-sortable label,
.non-sortable label {
    display: block;
    margin-bottom: 15px;
}

.non-sortable h4 {
    font-size: 16px;
    margin: 10px 0;
}

.widget-image-sortable label:last-child {
    margin-bottom: 0;
}

.widget-image-sortable .ui-sortable-helper {
    background: #fff;
}

.widget-image-sortable .non-sortable {
    background: #b1b1b1;
    padding: 15px;
}

</style>

	<?php

	}

	
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['sort'] = ( ! empty( $new_instance['sort'] ) ) ? strip_tags( $new_instance['sort'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['alt'] = ( ! empty( $new_instance['alt'] ) ) ? strip_tags( $new_instance['alt'] ) : '';
		$instance['button'] = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';

		return $instance;

	}

}

/**
 * Add our widget.
 *
 */

add_action( 'widgets_init', function(){
	register_widget( 'trento_Image_Widget' );
});