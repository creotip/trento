<?php 
	/*
Plugin Name: Recent Posts Carousel
Plugin URI: http://creotip.io/
Description: Displays a recent posts
Author: creotip
Version: 0.9.1
Author URI: http://creotip.io/
*/

class Recent_Posts_Carousel extends WP_Widget {
	 function Recent_Posts_Carousel()     {
		  $widget_ops = array( 'classname' => 'recent_rosts_carousel', 'description' =>  'Recent Posts Carousel'  );
		  $this->WP_Widget('Recent_Posts_Carousel', 'Recent Posts Carousel', $widget_ops);
	 }


	 function widget($args, $instance) {
        global $post;
        $post_old = $post; // Save the post object.
        
		  extract($args);
		  $title = apply_filters('widget_title', $instance['title'] );
		  $number = $instance['number'];
		  $number_mobile = $instance['number_mobile'];
		  $navigation = isset( $instance['navigation'] ) ? $instance['navigation'] :true;   
		  $paginax = isset( $instance['paginax'] ) ? $instance['paginax'] :true;          	
          // Get array of post info.
          $cat_posts = new WP_Query(
            "showposts=" . $instance["num"] . 
            "&cat=" . $instance["cat"] 

          );
	
		
?>

<!---------------Start Recent Posts ----------------->
<?php echo $before_widget; ?>

<?php if ( $title ) echo $before_title . $title . $after_title; ?>

<div class="posts-carousel <?php echo $this->id; ?>">

	 <?php 
        while ($cat_posts->have_posts()) :
			$cat_posts -> the_post();
			?>
	 <div class="recent-post-item">
			
		  <div class="rp-image">
				<?php if ( has_post_thumbnail() ) {the_post_thumbnail( 'bones-thumb-700' );} ?>
		  </div> 
		  <h5><a href="<?php  the_permalink()  ?>"><?php  the_title(); ?></a></h5>
			<p class="rpc-desc"><?php $content = get_the_content();echo wp_trim_words( $content , '12' ); ?></p>
	 </div>
	 <?php  endwhile; ?>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('.posts-carousel.<?php echo $this->id; ?>').slick({
			infinite: true,
  		speed: 200,
			slidesToScroll: 1,
      paginationSpeed : 300,
      slidesToShow : <?php 
			$def_num = "3";
		 if ($number) {echo $number;} else { echo $def_num;} ?>,
			arrows: <?php if ($navigation) { echo"true";} else {echo"false";} ?>,
			dots: <?php if ($paginax) { echo"true";} else {echo"true";} ?>,
			prevArrow: '<div class="rps-prev"><i class="fa fa-angle-left"></i></div>',
			nextArrow: '<div class="rps-next"><i class="fa fa-angle-right"></i></div>',
			responsive: [
				{
					breakpoint: 640,
					settings: {
						slidesToShow: <?php if ($number_mobile) {echo $number_mobile;} else { echo $def_num;} ?>,
						slidesToScroll: 1
					}
				}
			]				
		
		
  }); 
	
	jQuery(".posts-carousel").show();
});
</script>	
<style>

</style>
<?php echo $after_widget; ?>

<!------------- End Recent Posts ------------->



<?php
			// $args = array( 'post_type' => 'product',  'product_cat' =>$order1,'showposts'=> $number, 'orderby' => 'rand' );
			//do_shortcode( '[product_category category="'.$order1.'" per_page="'.$number.'" columns="1" orderby="date" order="rend"]');
		}

		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = $new_instance['number'];
			$instance['number_mobile'] = $new_instance['number_mobile'];
			$instance['cat'] = $new_instance['cat'];
            $instance['num'] = $new_instance['num'];
			$instance['navigation'] = (bool) $new_instance['navigation'];
			$instance['paginax'] = (bool) $new_instance['paginax'];
			return $instance;
		}

		
		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
			$title = esc_attr( $instance['title'] );
			$number = esc_attr( $instance['number'] );
			$number_mobile = esc_attr( $instance['number_mobile'] );
			$cat_posts = esc_attr( $instance['cat'] );
			$navigation = isset( $instance['navigation'] ) ? esc_attr( $instance['navigation'] ) :'';
			$paginax     = isset( $instance['paginax'] ) ? esc_attr( $instance['paginax'] ) :'';
			//$order = isset( $new_instance['order'] )? (bool) $instance['order'] : false;
			?>


<!----------------------------------------- Title -------------------------------------------->
			<p>
				<label for="<?php  echo $this->get_field_id('title'); ?>"><?php  _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php  echo $this->get_field_id('title'); ?>" name="<?php  echo $this->get_field_name('title'); ?>" type="text" value="<?php  echo $title; ?>" />
			</p>
<!----------------------------------------- /// ---------------------------------------------->




<!----------------------------------------- Number of items -------------------------------------------->
			<p>
				<label for="<?php  echo $this->get_field_id('number'); ?>"><?php  _e( 'Number of items:' ); ?></label>
				<input class="widefat" id="<?php  echo $this->get_field_id('number'); ?>" name="<?php  echo $this->get_field_name('number'); ?>" type="text" value="<?php  echo $number; ?>" />
			</p>
<!----------------------------------------- /// ---------------------------------------------->


<!----------------------------------------- Number on mobile -------------------------------------------->
			<p>
				<label for="<?php  echo $this->get_field_id('number_mobile'); ?>"><?php  _e( 'Number mobile:' ); ?></label>
				<input class="widefat" id="<?php  echo $this->get_field_id('number_mobile'); ?>" name="<?php  echo $this->get_field_name('number_mobile'); ?>" type="text" value="<?php  echo $number_mobile; ?>" />
			</p>
<!----------------------------------------- /// -------------------------------------------->		


<!----------------------------------------- Navigation -------------------------------------------->
			<p>
				<input class="checkbox" type="checkbox" <?php  checked( $instance['navigation'], true ); ?> id="<?php  echo $this->get_field_id( 'navigation' ); ?>" name="<?php  echo $this->get_field_name( 'navigation' ); ?>" />
				 
				<label for="<?php  echo $this->get_field_id( 'navigation' ); ?>"><?php  _e( 'Display navigation?' ); ?></label>
			</p>
<!----------------------------------------- /// -------------------------------------------->


<!----------------------------------------- Pagination -------------------------------------------->
			<p>
				<input class="checkbox" type="checkbox" <?php  checked( $instance['paginax'], true ); ?> id="<?php  echo $this->get_field_id( 'paginax' ); ?>" name="<?php  echo $this->get_field_name( 'paginax' ); ?>" />
				 
				<label for="<?php  echo $this->get_field_id( 'paginax' ); ?>"><?php  _e( 'Display pagination?' ); ?></label>
			</p>

<!----------------------------------------- /// -------------------------------------------->


<!----------------------------------------- Category -------------------------------------------->
            <p>
                <label>
                    <?php _e( 'Category' ); ?>:
                    <?php 
                    
                    wp_dropdown_categories( array( 
                    'name' => $this->get_field_name("cat"), 
                    'selected' => $instance["cat"] 
                    ) 
                    ); 
                    ?>
                </label>
            </p>
<!----------------------------------------- /// -------------------------------------------->


<!----------------------------------------- Number of Posts -------------------------------------------->
            <p>
                <label for="<?php echo $this->get_field_id("num"); ?>">
                    <?php _e('Number of posts to show'); ?>:
                    <input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
                </label>
            </p>
<!----------------------------------------- /// -------------------------------------------->

<?php
		}

	}

	add_action('widgets_init', create_function('', "register_widget('Recent_Posts_Carousel');"));


/*****************************
GENERATE SHORTCODE
*****************************/
// function rpc_shortcode() {
//     the_widget( 'Recent_Posts_Carousel' );
// }

// add_shortcode('test', 'rpc_shortcode');
