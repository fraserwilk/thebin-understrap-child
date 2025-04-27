<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
	<?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<div class="container">
					<div class="grid text-center" style="--bs-gap: 2rem;">

						<?php
						$args = array(
							'posts_per_page' => -1, // Show all posts
							'post_type'      => 'post', // Ensure it's pulling posts
							'orderby'        => 'date',
							'order'          => 'DESC'
						);

						$custom_query = new WP_Query($args);

						if ($custom_query->have_posts()) :
							while ($custom_query->have_posts()) : $custom_query->the_post();
						?>

								<article <?php post_class('g-col-md-6 g-col-lg-3 g-col-12'); ?> id="post-<?php the_ID(); ?>" style="border: 1px solid #000; padding: 1rem;">

									<header class="entry-header">
										<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

										<?php if ('post' === get_post_type()) : ?>
											<div class="entry-meta">
												<?php understrap_posted_on(); ?>
											</div>
										<?php endif; ?>
									</header>

									<?php if (has_post_thumbnail()) : ?>
										<div class="post-thumbnail">
											<?php echo get_the_post_thumbnail($post->ID, 'large', ['class' => 'img-fluid']); ?>
										</div>
									<?php endif; ?>

									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div>

									<footer class="entry-footer">
										<?php understrap_entry_footer(); ?>
									</footer>

								</article><!-- .post -->

							<?php
							endwhile;
							wp_reset_postdata(); // Reset post data to prevent conflicts
						else :
							?>


							<p><?php esc_html_e('Sorry, no posts found.', 'understrap'); ?></p>
						<?php endif; ?>

					</div><!-- .grid -->
				</div><!-- .container -->

				<!-- #post-<?php the_ID(); ?> -->

			</main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
