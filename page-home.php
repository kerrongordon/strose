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
	
	<?php //putRevSlider("strose") ?>

	 	<div class="w-h-full">

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-4of5 d-5of7 cf c-h-content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php get_sidebar( "homepage1" ); ?>

					</main>					

				</div>

			</div>

		</div>

		<?php include 'featured-news.php'; ?>

		<div class="w-h-full">

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-4of5 d-5of7 cf c-h-content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php get_sidebar( "homepage2" ); ?>

					</main>					

				</div>

			</div>

		</div>

		<?php include 'upcoming-events.php'; ?>	
<!--<div class="fimg"></div>-->

<?php get_footer(); ?>
