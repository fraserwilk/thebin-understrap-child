<?php
/**
 * The template for displaying category events
 *
 * @package Understrap
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main col" id="main">

				<?php if (have_posts()) : ?>

					<header class="page-header">
						<h1 class="page-title">Events</h1>
					</header>

					<?php
					while (have_posts()) :
						the_post();

						if (has_category('Events')) :
					?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header pt-3">
									<a href="<?php the_permalink(); ?>" rel="bookmark">
										<h2 class="entry-title"><?php the_field('event_title'); ?></h2>
									</a>
								</header>

								<div class="entry-content pt-2">
									<p><strong>Date: </strong><?php the_field('event_start_date'); ?>
									<?php if (get_field('event_end_date')) : ?>
										<span> to <?php the_field('event_end_date'); ?></span>
									<?php endif; ?>
									</p>
									
									<p><?php echo wp_trim_words(get_field('event_details'), 40, '...'); ?></p>
									

									<p><strong>Location:</strong> <?php the_field('event_location'); ?></p>
									

								</div>
							</article>
							<hr class="article-hr text-primary">
					<?php
						endif;

					endwhile;

					understrap_pagination();

				else :
					get_template_part('loop-templates/content', 'none');

				endif;
				?>

			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
