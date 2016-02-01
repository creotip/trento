<?php

/*
Plugin Name: Instush - Instagram Feed Gallery
Plugin URI: http://creotip.io/instush
Description: Instagram Feed Gallery for WordPress
Version: 1.0
Author: creotip.io
Author URI: http://creotip.io/
License: GPLv2 or later
*/
function instush_slider_activation() {
}
register_activation_hook(__FILE__, 'instush_slider_activation');


function instush_slider_deactivation() {
}
register_deactivation_hook(__FILE__, 'instush_slider_deactivation');



add_action('wp_enqueue_scripts', 'instush_scripts');
function instush_scripts() {
  wp_register_script( 'insta-js', get_stylesheet_directory_uri() . '/library/js/instagramLite.js', array( 'jquery' ), '', true );   
  wp_enqueue_script('insta-js');
}



add_shortcode("instush", "instush_display_slider");

?>



<?php  function instush_display_slider( $atts ) {
 
 $atts = shortcode_atts(array(
            'id' => '7',
        ), $atts);
?>

<?php
  $generated_id = uniqid();
?>  
<div class="wrap-instush <?php echo $generated_id; ?>">
  <h3 class="center caps">Instagram feed Gallery</h3> 
  <ul class="instush-<?php echo $atts['id']; ?> instush"></ul> 
  <div class="load-more clearfix center">  
    <button class="load-more-btn btn btn-outline center caps"><span>load more</span></button>   
  </div> 
</div>  
<script>
jQuery( document ).ready(function() {  
  jQuery('.instush-<?php echo $atts['id']; ?>').instagramLite({
      clientID: '<?php echo get_option('instush_client_id'); ?>',
      username: '<?php echo get_option('instush_username'); ?>',
      limit: <?php echo get_option('instush_num_items'); ?>,
      urls: true,
      videos: false, 
      captions: false,
      likes: true,
      comments_count: true,
      load_more: ".load-more-btn"
  });
});  
  

jQuery(document).ready(function(){
  jQuery('.load-more-btn').on('click', loadBar)
  
  function loadBar(){
    jQuery('.load-more-btn').contents().after('<span class="loading-bar gradient-animate px1"><i class="fa fa-spinner fa-spin"></i> </span>')
    setTimeout(function(){
      jQuery('.loading-bar').remove();
    }, 800);
  }
  
});  
</script>
<?php } ?>


<?php

add_action('admin_menu', 'instush_plugin_settings');

function instush_plugin_settings() {
    //creecho ate new top-level menu
    add_menu_page('Instush Settings', 'Instush Settings', 'administrator', 'instush_settings', 'instush_display_settings');
}

?>

<?php
function instush_display_settings()
{
?>
    <div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

  <p><strong>Username:</strong><br />
    <input type="text" name="instush_username" size="45" value="<?php echo get_option('instush_username'); ?>" /></p>

    <p><strong>Client ID:</strong><br />
    <input type="text" name="instush_client_id" size="45" value="<?php echo get_option('instush_client_id'); ?>" /></p>

    <p><strong>Number items:</strong><br />
    <input type="text" name="instush_num_items" size="45" value="<?php echo get_option('instush_num_items'); ?>" /></p>



    <p><input class="button button-primary" type="submit" name="Submit" value="Update Options" /></p>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="instush_username,instush_client_id,instush_num_items" />
          
        </form>
    </div>
<?php
}
?>