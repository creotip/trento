<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">
				<div class="toolbar">
					<div class="wrap wrap-toolbar relative">
						
							<?php global $woocommerce; ?> 
							<div class="mini-cart right">							  
								<!-- Dropdown cart -->
								<?php if (class_exists('Woocommerce')) { ?>
									<a href="#" class="toggle-cart-dropdown">

										<span class="mini-cart-item-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
										<span><?php echo __('Items'); ?></span>
										<span class="mini-cart-item-amount">/<?php echo $woocommerce->cart->get_cart_total(); ?></span>
									
									</a>

									<div class="mini-cart-dropdown absolute right-0">
										<?php the_widget( 'WC_Widget_Cart' ); ?> 
									</div>			
								<?php } ?>
								<!-- End Dropdown cart -->							  
							</div>	
						
						<span>Cart<i class="fa fa-shopping-bag px1"></i></span>
						<span class="left">FREE SHIPPING ON ORDERS $75!</span>
					</div>		
				</div>
			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div id="inner-header" class="wrap cf md-show">
					<div class="wrap-nav-logo table full-width relative">
						
					

						<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
								<div class='site-logo'>
										<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>							
								</div>
						<?php else : ?>
								<div class="site-logo" itemscope itemtype="http://schema.org/Organization">					
									<hgroup>
											<h1 class="site-title m0"  itemprop="name">
												<a class='black' href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
													<span>
													<?php bloginfo( 'name' ); ?>
														</span>
												</a>
											</h1>
	<!-- 										<h2 class="site-description" itemprop="description"><?php //bloginfo( 'description' ); ?></h2> -->
									</hgroup>
								</div>	
						<?php endif; ?>


						<nav class="site-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<div class="nav-icon-block">
								<div class="wrap-nav-search">
									<div id="toggle-search" class="wrap-search btn"><i class="fa fa-search"></i></div>
									<form id="search-form" role="search" method="get"  class="nav-searchform" action="<?php echo home_url( '/' ); ?>">
										<fieldset>
											<input id="s" name="s" value=""  type="search" placeholder="Search (for example: shirt)"  />
										</fieldset>
										<button type="submit" value="Submit" form="search-form"><i class="fa fa-search"></i></button>
									</form>
								</div>
														
								<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		
									<div class="wrap-minicart btn">
										<i class="fa fa-shopping-basket">
											<span class="basket-count mini-cart-item-count">
												<?php echo $woocommerce->cart->cart_contents_count; ?>
											</span>
										</i>
									</div>	
								<?php endif; ?>			
							</div>							
							<?php wp_nav_menu(array(
												 'container' => false,                           // remove nav container
												 'container_class' => 'menu cf',                 // class of container (should you choose to use it)
												 'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
												 'menu_class' => 'nav top-nav cf',               // adding custom nav class
												 'theme_location' => 'main-nav',                 // where it's located in the theme
												 'before' => '',                                 // before the menu
															 'after' => '',                                  // after the menu
															 'link_before' => '',                            // before each link
															 'link_after' => '',                             // after each link
															 'depth' => 0,                                   // limit the depth of the nav
												 'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>




						</nav>
					</div>
				</div>
				
				<?php require_once( 'partials/touch-header.php' ); ?>

			</header>
