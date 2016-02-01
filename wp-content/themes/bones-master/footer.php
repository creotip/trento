			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap inner-footer cf">


					
						<?php
							if ( ! is_active_sidebar( 'footer-sidebar-1' )
							&& ! is_active_sidebar( 'footer-sidebar-2' )
							&& ! is_active_sidebar( 'footer-sidebar-3' )	
							&& ! is_active_sidebar( 'footer-sidebar-4' )	

							)
							return;

						// If we get this far, we have widgets. Let do this.
						?>

						<div class="sidebar_container">

								<div id="secondary-sidebar" class="sidebar_wrap clearfix widget-area" role="complementary">

									<div class="md-col-12 lg-col-12 col">

										<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
												<div class="<?php wpforge_footer_sidebar_class(); ?> col">
														<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
												</div><!-- .first -->
												<?php endif; ?>

												<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
												<div class="<?php wpforge_footer_sidebar_class(); ?> col">
														<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
												</div><!-- .second -->
												<?php endif; ?>

												<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
												<div class="<?php wpforge_footer_sidebar_class(); ?> col">
														<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
												</div><!-- .third -->
												<?php endif; ?>	
										
												<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
												<div class="<?php wpforge_footer_sidebar_class(); ?> col">
														<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
												</div><!-- .third -->
												<?php endif; ?>	
									</div><!-- /columns -->    

								</div><!-- #secondary -->

						</div><!-- end .sidebar_container -->				
					
					

				</div>

			</footer>
			<div class="foot-copyright">
				<div class="wrap">
				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
				</div>	
			</div>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
