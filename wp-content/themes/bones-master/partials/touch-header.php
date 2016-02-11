<div id="inner-touch-header" class="wrap cf md-hide">
 <div class="touch-nav-wrap col">
    <i class="fa fa-bars fa-2x left"></i>
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
</div>