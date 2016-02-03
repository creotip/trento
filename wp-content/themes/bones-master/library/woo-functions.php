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
////////


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
///////


// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 ); 
//


/* This snippet removes the action that inserts thumbnails to products in teh loop
 * and re-adds the function customized with our wrapper in it.
 * It applies to all archives with products.
 *
 * @original plugin: WooCommerce
 * @author of snippet: Brian Krogsard
 */

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
			  $output .= '<div><img class="cat-img" src="' .get_the_post_thumbnail_src(get_the_post_thumbnail()) .'" alt="'.$image_title.'" /></div>';   
			  	
				//Thumbnails  
				foreach( $attachment_ids as $attachment_id ) 
					{
						$thumb_title = esc_attr( get_the_title( $attachment_id ) );
						$output .= '<div><img class="cat-thumbs" src="' .wp_get_attachment_url( $attachment_id ). '" alt="'.$thumb_title.'" /></div>';
					
					}	
			  
        }       
		 
		 
        $output .= '</div>';
        return $output;

    }
}



// Replace WooThemes Breadcrumbs with Yoast breadcrumbs
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