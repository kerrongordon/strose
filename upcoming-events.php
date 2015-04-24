<div class="sub-h-full cf">

	<div id="content">

		<div id="inner-content" class="wrap cf">

		<!--<h1 class="fea-news-title">Events</h1>-->
	
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
						'cache_results'          => true,
						'update_post_meta_cache' => true,
						'update_post_term_cache' => true,
						'meta_query'			=>	$meta_quer_args
					);

					$upcoming_events = new WP_Query( $query_args ); ?>

					<div class="event-list cf">
					
					<ul class="sis_event_entries">
						<?php while( $upcoming_events->have_posts() ): $upcoming_events->the_post();
							$event_start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
							$event_end_date = get_post_meta( get_the_ID(), 'event-end-date', true );
							$event_venue = get_post_meta( get_the_ID(), 'event-venue', true );
							$event_image= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						?>
							<li class="sis_event_entry featured-post hentry">
								
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

								<a href="<?php the_permalink(); ?>">
								<time class="sis_event_date"><span class="dashicons dashicons-calendar-alt"></span> 
								<?php kgp_get_date(); ?>
								</time>
								</a>
							</li>
						<?php endwhile; ?>

					</ul>

					</div>

		<?php // Restore original Post Data
		wp_reset_postdata();

		?>

		</div>

	</div>

</div>