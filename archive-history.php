<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content" class="oh">

				<div id="inner-content" class="wrap cf">

					<h1 class="title-page">Our History</h1>

						<main id="main" class="history-over m-3of4 t-2of3 d-4of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div class="fixlocal"></div>

							<?php
							  // set up or arguments for our custom query
							  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
							  $query_args = array(
							    'post_type' 		=> 'history',
							    'order'          	=> 'ASC',
							    'posts_per_page' 	=> -1,
							    'paged' 			=> $paged
							  );
							  // create a new instance of WP_Query
							  $the_query = new WP_Query( $query_args );
							?>

							<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<div class="post-img">									
									
										<?php the_post_thumbnail( 'bones-thumb-900' ); ?> 										
										<a type="button" href="<?php the_permalink() ?>" class="readmore-h "><span class="dashicons dashicons-archive"></span></a>
									
								</div>

																	
									<p class="byline entry-meta vcard date-card wow zoomIn">
                                        				<?php printf( __( 'On %1$s', 'strose' ),
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>


								<section class="entry-content cf">
									<?php the_content(); ?>
								</section>

							</article>

							<?php endwhile; ?>

									<?php //bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class=" cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'strose' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'strose' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'strose' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>


				</div>

			</div>

<?php get_footer(); ?>
