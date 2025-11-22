<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitsolutions
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <?php wp_head(); ?>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-QEEYPF8DL0"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-QEEYPF8DL0');
	</script>

</head>

<body class="index-page" <?php body_class(); ?>>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

 <a href="<?php echo esc_url( home_url('/') ); ?>" class="logo d-flex align-items-center me-auto me-xl-0">
  <?php 
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
            'class' => 'custom-logo'
        ) );
        echo $logo;
    } else {
        echo '<h1 class="sitename">' . get_bloginfo( 'name' ) . '</h1>';
    }
  ?>
</a>

      <nav id="navmenu" class="navmenu">
        <!-- <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#team">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul> -->
		<?php
			wp_nav_menu([
			'theme_location' => 'menu-1',
			'menu_class' => '',
			'container' => false,
			'fallback_cb' => false,
			]);
		?>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="tel:+919881990232">+91 9881990232</a>

    </div>
  </header>
<main class="main">

