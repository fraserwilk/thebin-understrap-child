<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<!-- 
	<div class="entry-content">
		<div id="home-grid" class="post-pattern">
			<div class="col col-1">
				<div class="box">Left Top</div>
				<div class="box">Left Bottom</div>
			</div>
			<div class="col col-2">
				<div class="box large">Center</div>
			</div>
			<div class="col col-3">
				<div class="box">Right Top</div>
				<div class="box">Right Bottom</div>
			</div>
		</div> -->

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
