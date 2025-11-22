<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitsolutions
 */


get_header(); ?>


    <!-- Hero Section -->
	 <?php
		get_template_part('template-parts/sections/hero');
	?>
    <!-- /Hero Section -->

    <!-- About Section -->
	 <?php
		get_template_part('template-parts/sections/about-us');
	?>
    <!-- /About Section -->

    <!-- How We Work Section -->
	 <?php
		get_template_part('template-parts/sections/how-we-work');
	?>
    <!-- /How We Work Section -->

    <!-- Services Section -->
	 <?php
		get_template_part('template-parts/sections/services');
	?>
    <!-- /Services Section -->

    <!-- Services Alt Section -->
	  <?php
		get_template_part('template-parts/sections/services-alt');
	?>
    <!-- /Services Alt Section -->

    <!-- Call To Action 2 Section -->
	 <?php
		get_template_part('template-parts/sections/call-to-action-2');
	?>
    <!-- /Call To Action 2 Section -->

    <!-- Portfolio Section -->
	<?php
		get_template_part('template-parts/sections/portfolio');
	?>
    <!-- /Portfolio Section -->

    <!-- Faq Section -->
	<?php
		get_template_part('template-parts/sections/faq');
	?>	
	<!-- /Faq Section -->

    <!-- Team Section -->
	 <?php
		get_template_part('template-parts/sections/team');
	?>
    <!-- /Team Section -->

    <!-- Testimonials Section -->
	 <?php
		get_template_part('template-parts/sections/testimonial');
	?>
    <!-- /Testimonials Section -->

    <!-- Contact Section -->
	  <?php
		get_template_part('template-parts/sections/contact');
	?>
    <!-- /Contact Section -->

<?php get_footer(); ?>
