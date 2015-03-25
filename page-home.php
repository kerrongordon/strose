<?php
/*
 Template Name: Home Page 
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
	
	<?php putRevSlider( "strose" ) ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php get_sidebar( "homepagemain" ); ?>

					</main>

					<div class="event sidebar m-all t-1of3 d-2of7 last-col cf">
					
					<?php

						$args = array(
							'category_name'  => 'events',
						    'post_type'      => 'post',
						    'posts_per_page' => '2'
						);


						// The Query
						$the_query = new WP_Query( $args );

						// The Loop
						if ( $the_query->have_posts() ) { 

							while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
								<div class="event-list hentry">
								<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4> 
								<p class="byline entry-meta vcard">
                                        				<?php printf( __( 'Posted %1$s by %2$s', 'strose' ),
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
								</p>
								
								<div class="entry-content">
									<p>
										<?php
										  $excerpt = get_the_excerpt();
										  echo string_limit_words($excerpt,25);
										?>
									</p>
								</div>

								</div>

						<?php }

						} else {
							// no posts found
							echo '<h2>No Events found</h2>';
						}
						/* Restore original Post Data */
						wp_reset_postdata();

					?>	
					</div>					

				</div>

			</div>

			

<!--<div class="fimg"></div>-->

<?php get_footer(); ?>
