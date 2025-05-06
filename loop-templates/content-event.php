<?php

/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row align-items-center border border-light">
	<!-- Left Column: Title & Date -->
	<div class="col-md-6">
		<h1 class="entry-title">
				<?php the_field('event_title'); ?>
		</h1>
		<p class="text-muted mb-0">
			<strong>Date: </strong>
			<?php the_field('event_start_date'); ?>
			<?php if (get_field('event_end_date')) : ?>
				<span> to <?php the_field('event_end_date'); ?></span>
			<?php endif; ?>
		</p>

		<p><strong>Location:</strong> <?php the_field('event_location'); ?></p>
		<p><strong>Website:</strong> <a href="<?php the_field('event_website'); ?>" target="_blank"><?php the_field('event_website'); ?></a></p>
	</div>

	<!-- Right Column: Image -->
	<div class="col-md-6">
		<?php if (has_post_thumbnail()): ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
			</a>
		<?php endif; ?>
	</div>
	</div>



	<div class="entry-content pt-2">
		<p><?php echo get_field('event_details'); ?></p>



	</div>

<footer class="entry-footer">

	<?php understrap_entry_footer(); ?>

</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->