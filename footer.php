	<?php get_sidebar( "dailymessage" ); ?>
		<?php get_sidebar('footerbar'); ?>

			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'strose' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> <?php bloginfo('description'); ?></p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		
		<script>
 			new WOW().init();
		</script>
		
		<script type="text/javascript">
			/* * * Just replace ExampleShortname with your shortname  * * */
			var disqus_shortname = 'testout'; // required: replace example with your forum shortname
			/* * * Don't make any change for bellow lines * * */
			(function () {
			var s = document.createElement('script'); s.async = true;
			s.type = 'text/javascript';
			s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
			(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
			}());
		</script>

		<script>
			var DEBUG_MODE = true; // Set this value to false for production
 
			if(typeof(console) === 'undefined') {
			    console = {}
			}
			 
			if(!DEBUG_MODE || typeof(console.log) === 'undefined') {
			    // FYI: Firebug might get cranky...
			    console.log = console.error = console.info = console.debug = console.warn = console.trace = console.dir = console.dirxml = console.group = console.groupEnd = console.time = console.timeEnd = console.assert = console.profile = function() {};
			}
		</script>

	</body>

</html> <!-- end of site. what a ride! -->
