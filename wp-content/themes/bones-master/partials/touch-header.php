<div class="wrap-touch-nav">
	<!--<div class="close-touch-button" >
		<a href="#" class="menu creonav nav-click"><span></span></a>
	</div>-->
	<div class="touch-search-container">	
			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
					<div>
							<div class="col col-10">
								<input class="" placeholder="search..." type="search" id="s" name="s" value="" />
							</div>
							<div class="col col-2">
								<button class="white btn-outline not-rounded border-none " type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
							</div>
					</div>
			</form>		
	
	</div>
	<div class="touch-nav-container">
					<?php wp_nav_menu(array(
				         'container' => false,                           // remove nav container
				         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
				         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
				         'menu_class' => 'touch-nav top-nav cf',               // adding custom nav class
				         'theme_location' => 'main-nav',                 // where it's located in the theme
				         'before' => '',                                 // before the menu
			     'after' => '',                                  // after the menu
			     'link_before' => '',                            // before each link
			     'link_after' => '',                             // after each link
			     'depth' => 0,                                   // limit the depth of the nav
				         'fallback_cb' => ''                             // fallback function (if there is one)
					)); ?>
	</div>
</div>  
<div class="status"></div>	


<div id="inner-touch-header" class="wrap cf md-hide">
	
<div class="open-touch-button" >
	<span href="#" class="menu creonav"><span></span></span>
</div>
   
<div class="touch-logo-wrap">
					<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
							<div class='site-logo'>
									<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>							
							</div>
					<?php else : ?>
							<div class="site-logo" itemscope itemtype="http://schema.org/Organization">					
								<hgroup>
										<h1 class="site-title m0"  itemprop="name">
											<a class='black' href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
												<span><?php bloginfo( 'name' ); ?></span>
											</a>
										</h1>
<!-- 										<h2 class="site-description" itemprop="description"><?php //bloginfo( 'description' ); ?></h2> -->
								</hgroup>
							</div>	
					<?php endif; ?>
  </div>  
  
  <div class="cart-touch-button" >
	<button class="btn"><i class="fa fa-shopping-bag px1"></i></button>
</div>
</div>



