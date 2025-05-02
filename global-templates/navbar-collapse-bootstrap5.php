<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-thebin" aria-labelledby="main-nav-label" data-bs-theme="dark">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="<?php echo esc_attr( $container ); ?>">

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
			>
			<span class="navbar-toggler-icon"></span>
		</button>
		

		<!-- The BIN branding in the menu -->
		 <div class="binlogo">
			<?php get_template_part( 'global-templates/navbar-branding' ); ?>
		</div>
		

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto text-uppercase',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
		
		<button class="btn ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-expanded="false" aria-controls="navbarSearch">
			<i class="bi bi-search text-light"></i>
		</button>
		

		

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->
<div class="collapse" id="navbarSearch">
  <div class="container py-2 text-end" style="margin-left:auto; margin-right:10%;">
	<!-- Search form -->
  <?php get_search_form(); ?>
    <!-- <form class="d-flex justify-content-end" role="search">
      <input class="form-control" type="search" placeholder="What to look for?" aria-label="Search">
      <button class="btn btn-outline-light" type="submit">Search</button>
    </form> -->
  </div>
</div>


<!-- The Secondary WordPress Menu -->
<nav id="secondary-nav" class="navbar navbar-expand-md bg-light navbar-dark text-warning">
	<h2 id="secondary-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Secondary Navigation', 'understrap' ); ?>
	</h2>

	<div class="<?php echo esc_attr( $container ); ?>-fluid p-0">

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'secondary',
				'container_class' => 'collapse navbar-collapse text-dark shadow',
				'container_id'    => 'navbarSecondary',
				'menu_class'      => 'navbar-nav secondary-nav ms-auto text-uppercase',
				'fallback_cb'     => '',
				'menu_id'         => 'secondary',
				'depth'           => 1,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
	</div><!-- .container(-fluid) -->
</nav>
