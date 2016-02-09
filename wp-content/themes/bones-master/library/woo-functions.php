<?php
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="toggle-cart-dropdown" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
	<?php
	
	$fragments['a.toggle-cart-dropdown'] = ob_get_clean();
	
	return $fragments;
}


/////************//
/// Show category name in category products //////////////////////
//****************//
function wc_category_title_archive_products(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <div class="product_category_title"><?php echo $single_cat->name; ?></div>

<?php }
}
add_action( 'woocommerce_after_shop_loop_item', 'wc_category_title_archive_products', 5 );



/////************//
/// Show category thumbnail in category page //////////////////////
//****************//
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="" />';
		}
	}
}

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );

/////************//
/// Show category name and image //////////////////////
//****************//

/*
$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term ){
  $category_name = $term->name;
  $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
  $image = wp_get_attachment_url($category_thumbnail);
	echo '<h3>'.$category_name.'</h3>';
  echo '<img class="absolute category-image" src="'.$image.'">';
}
*/

/////************//
/// Change number or products per row to 3 //////////////////////
//****************//
/*
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
*/


/////************//
/// Display 24 products per page. Goes in functions.php //////////////////////
//****************//
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 ); 


/////************//
/// Remove hrefs //////////////////////
//****************//
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'mycode_woocommerce_template_loop_product_link_open', 20 );


/////************//
/// Remove Title - Create Custom Title //////////////////////
//****************//
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

// add a new fonction to the hook
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
    function woocommerce_template_loop_product_title() {
        echo change_product_title();
    } 
}

if ( ! function_exists( 'change_product_title' ) ) {   
    function change_product_title( ) {
	
			echo $woo_title = '<h3><a href="'.get_permalink($product_id).'">'.get_the_title($product_id).'</a></h3>';
			
    }
}

/////************//
/// Remove Image - Create Custom Image and Thumbnails //////////////////////
//****************//
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}

function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}


if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce, $product;
        $output = '<div class="imagewrapper">';

			$attachment_ids = $product->get_gallery_attachment_ids(); 
			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );		 		 
		 
		 
        if ( has_post_thumbnail() ) {               
            		  
			  //Main Cat Image
			  $output .= '<div class="woo-img-slide">' .get_the_post_thumbnail( $post->ID, $size, array( 'alt' => get_the_title()) ) .'</div>';   
			  	
				//Thumbnails  
				foreach( $attachment_ids as $attachment_id ) 
					{
						$image_attributes = wp_get_attachment_image_src( $attachment_id, $size );
					
						$thumb_title = esc_attr( get_the_title( $attachment_id ) );
						$output .= '<div><img class="cat-thumbs" src="' .$image_attributes[0]. '" alt="'.$thumb_title.'" /></div>';
					

					}	
			  
        }       
		 
		 
        $output .= '</div>';
        return $output;

    }
}


/////************//
///Replace WooThemes Breadcrumbs with Yoast breadcrumbs //////////////////////
//****************//
add_action( 'init', 'hh_breadcrumbs' );

function hh_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    add_action( 'woocommerce_before_main_content','hh_yoast_breadcrumb', 20, 0);
    function hh_yoast_breadcrumb() {
        if ( function_exists('yoast_breadcrumb')  && !is_front_page() ) {
            yoast_breadcrumb('<p class="breadcrumbs">','</p>');
        }
    }

}

?>