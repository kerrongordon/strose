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
	
	 <?php putRevSlider("strose") ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php get_sidebar( "homepagemain" ); ?>

					</main>

					<div class="event sidebar m-all t-1of3 d-2of7 last-col cf">


					<?php
					//Preparing the query for events
					$meta_quer_args = array(
						'relation'	=>	'AND',
						array(
							'key'		=>	'event-end-date',
							'value'		=>	time(),
							'compare'	=>	'>='
						)
					);

					$query_args = array(
						'post_type'				=>	'event',
						'posts_per_page'		=>	2,
						'post_status'			=>	'publish',
						'ignore_sticky_posts'	=>	true,
						'meta_key'				=>	'event-start-date',
						'orderby'				=>	'meta_value_num',
						'order'					=>	'ASC',
						'meta_query'			=>	$meta_quer_args
					);

					$upcoming_events = new WP_Query( $query_args ); ?>

					<div class="event-list hentry">
					
					<ul class="sis_event_entries">
						<?php while( $upcoming_events->have_posts() ): $upcoming_events->the_post();
							$event_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
							$event_end_date = get_post_meta( get_the_ID(), 'event-end-date', true );
							$event_venue = get_post_meta( get_the_ID(), 'event-venue', true );
							$event_image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						?>
							<li class="sis_event_entry">
								
								<h4>
									<a href="<?php the_permalink(); ?>" class="sis_event_title"><?php the_title(); ?></a>
									<span class="event_venue">at <?php echo $event_venue; ?></span>
								</h4>

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

								<time class="sis_event_date">On 
									<?php echo date_i18n( get_option( 'date_format' ), $event_start_date ); ?> 
									To 
									<?php echo date_i18n( get_option( 'date_format' ), $event_end_date ); ?></time>
							</li>
						<?php endwhile; ?>
					</ul>

					</div>

					<!--<a href="<?php //echo get_post_type_archive_link( 'event' ); ?>"><?php //_e( 'View All Events', 'upcoming-events' ); ?></a>-->

					<?php
					wp_reset_query();

					?>
					

					</div>					

				</div>

			</div>

			

<!--<div class="fimg"></div>-->

<?php get_footer(); ?>
