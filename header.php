<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="theme-color" content="#3f51b5">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<div class="navontop">

			<header class="header wow slideInDown" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">
					
					
						<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
						<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" class="" rel="nofollow"> <?php echo bloginfo('name'); ?> </a></div>

						<?php // if you'd like to use the site description you can un-comment it below ?>
						<span class="description"><?php bloginfo('description'); ?></span>
						
						<div class="mobile-menu">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</div>

						<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
	    					         'container' => false,                           // remove nav container
	    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					         'menu' => __( 'The Main Menu', 'strose' ),  // nav name
	    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
	    					         'theme_location' => 'main-nav',                 // where it's located in the theme
	    					         'before' => '',                                 // before the menu
	        			               'after' => '',                                  // after the menu
	        			               'link_before' => '',                            // before each link
	        			               'link_after' => '',                             // after each link
	        			               'depth' => 0,                                   // limit the depth of the nav
	    					         'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>

							<?php get_search_form(' menu_search '); ?>

						</nav>

				</div>

			</header>

			</div>

		<?php if ( is_front_page() ) : ?>


		<?php else : ?>

			<div class="subscriptions bchead m-all cf wow fadeIn">

			<?php 
				$page_id = get_queried_object_id();
				if ( has_post_thumbnail( $page_id ) ) :
				    $image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'bones-thumb-700' );
				    $image = $image_array[0];
				else :
				    $image = get_template_directory_uri() . '/library/images/bg.png';
				endif; 
			?>
			<div class="post-img-big-overlay"></div>
			<img class="post-img-big" src="<?php echo $image;?>" alt="">
				<div class="wrap cf">

					<!--<div class="breadcrumbs cf wow slideInDown" xmlns:v="http://rdf.data-vocabulary.org/#">
					    <?php //if(function_exists('bcn_display'))
					    //echo '<span class="youhere">You are here: </span>'; echo '<div class="breadlist">'; { bcn_display(); } echo '</div>'; ?>
					</div>-->

				</div>

			</div>

		<?php endif; ?>



