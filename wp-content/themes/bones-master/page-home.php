<?php
/*
 Template Name: Home-Page Template 
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

					<?php if ( is_active_sidebar( 'sidebar-top-full' ) ) : ?>
						<div id="sidebar-top-full" class="sidebar-top-full cf" role="complementary">
								<?php dynamic_sidebar( 'sidebar-top-full' ); ?>
						</div>	
						
					<?php //else : ?>
<!-- 							<div class="no-widgets">
								<p><?php //_e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
							</div> -->
					<?php endif; ?>



			<div id="content" class="content one-column">

				<div id="inner-content" class="wrap cf ">
					
					<?php if ( is_active_sidebar( 'sidebar-top' ) ) : ?>
						<div id="sidebar-top" class="sidebar-top cf" role="complementary">
								<?php dynamic_sidebar( 'sidebar-top' ); ?>
							
						</div>
					<?php else : ?>
							<div class="no-widgets">
								<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
							</div>
					<?php endif; ?>
					

						<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section>


			

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php //get_sidebar(); ?>

				</div>

			</div>

			<div class="strip clearfix center white bg-black-2">
				<div class="wrap">
						<div class="sm-col sm-col-4  py3">
							<i class="fa fa-map-marker fa-2x"></i>
							<h4 class="lighter m1">Find a Store</h4>
						</div>
						<div class="sm-col sm-col-4  py3">
							<i class="fa fa-credit-card fa-2x"></i>
							<h4 class="lighter m1">Buy Gift Cards</h4>
						</div>
						<div class="sm-col sm-col-4  py3">
							<i class="fa fa-user fa-2x"></i>
							<h4 class="lighter m1">Careers</h4>
						</div>					
				</div>
			</div>
<?php get_footer(); ?>
