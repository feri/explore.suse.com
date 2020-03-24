<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until id="main-core".
 *
 * @package ThinkUpThemes
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <?php thinkup_hook_header(); ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="profile" href="//gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/lib/scripts/html5.js" type="text/javascript"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?><?php thinkup_bodystyle(); ?>>
<?php /* Body hook */ thinkup_hook_bodyhtml(); ?>
<div id="body-core" class="hfeed site">

	<header id="site-header">

		<?php if ( get_header_image() ) : ?>
			<div class="custom-header">
        <img src="<?php esc_url( header_image() ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
      </div>
		<?php endif; // End header image check. ?>

		<div id="pre-header">
      <div class="wrap-safari">
        <div id="pre-header-core" class="main-navigation">
      
          <?php if ( has_nav_menu( 'pre_header_menu' ) ) : ?>
          <?php wp_nav_menu( array( 'container_class' => 'header-links', 'container_id' => 'pre-header-links-inner', 'theme_location' => 'pre_header_menu' ) ); ?>
          <?php endif; ?>

          <?php /* Social Media Icons */ thinkup_input_socialmediaheader(); ?>

        </div>
      </div>
		</div>
		<!-- #pre-header -->

		<div id="header">
      <div id="header-core">

        <div id="logo">
          <?php /* Custom Logo */ echo thinkup_custom_logo(); ?>
        </div>

        <div id="hdr-wrapper">
          <?php if ( has_nav_menu( 'sec_header_menu' ) ) : ?>
          <div id="sec-header-links" class="secondary-navigation">
          <?php 
            wp_nav_menu(array( 'container' => false, 'theme_location'  => 'sec_header_menu' )); 
          ?>
            <ul class="menu login">
              <li id="menu-item-xxx" class="menu-item menu-item-type-post_type menu-item-object-page">
              <?php 
                // wp_loginout(); 
                $link = "/login";
                $label = __("Login", "experon");
                $current_user = wp_get_current_user();
                if (is_user_logged_in()) {
                  $link = "/my-account/details";
                  $label = esc_html($current_user->display_name);
                }
              ?>
                <a class="loginout" href="<?php echo $link; ?>"><?php echo $label; ?></a>
              </li>
            </ul>
          </div>
          <?php endif; ?>

          <div id="header-links" class="main-navigation">
            <div id="header-links-inner" class="header-links">
            <?php 
              wp_nav_menu(array( 'container' => false, 'theme_location'  => 'header_menu', 'walker' => new thinkup_menudescription() ) ); 
              /* Header Search */ 
              thinkup_input_headersearch(); 
            ?>
            </div>
          </div>
          <!-- #header-links .main-navigation -->
        </div>

        <?php /* Add responsive header menu */ thinkup_input_responsivehtml1(); ?>

      </div>
		</div>
		<!-- #header -->

		<?php /* Add responsive header menu */ thinkup_input_responsivehtml2(); ?>

		<?php /* Custom Slider */ thinkup_input_sliderhome(); ?>

	</header>
	<!-- header -->

	<?php /*  Call To Action - Intro */ thinkup_input_ctaintro(); ?>
	<?php /*  Pre-Designed HomePage Content */ thinkup_input_homepagesection(); ?>

	<div id="content">
    <h2><?php thinkup_title_select() ?></h2>
    <div id="content-core">
      <div id="main">
        <div id="main-core">
