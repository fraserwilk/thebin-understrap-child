<?php

/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
	get_template_part('global-templates/hero');
}

$wrapper_id = 'full-width-page-wrapper';
if (is_page_template('page-templates/no-title.php')) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. 
							?>">

	<div class="<?php echo esc_attr($container); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while (have_posts()) {
						the_post();
						get_template_part('loop-templates/content', 'home');
					}
					?>


					<?php
					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => 3, // Show only 3 posts
						'category_name'  => 'interesting', // Filter by category slug
					);
					$extra_query = new WP_Query($args);
					?>

					<section id="services-1330">
						<div class="cs-container">
						<ul class="cs-card-group">
    <?php if ($extra_query->have_posts()) : $count = 1; ?>
        <?php while ($extra_query->have_posts()) : $extra_query->the_post(); ?>
            <li class="cs-item">
                <div class="cs-card-flex">
                    <div class="cs-card-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <picture class="cs-picture">
                                <img decoding="async"
                                    src="<?php the_post_thumbnail_url('medium'); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    width="150" height="150" aria-hidden="true">
                            </picture>
                        <?php else: ?>
                            <picture class="cs-picture">
                                <img decoding="async"
                                    src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/MISC/finance-screen.png"
                                    alt="Default" width="150" height="150" aria-hidden="true">
                            </picture>
                        <?php endif; ?>
                    </div>
                    <div class="cs-card-content">
                        <a href="<?php the_permalink(); ?>" class="cs-link">
                            <span class="cs-number"><?php echo sprintf('%02d', $count); ?></span>
                            <h3 class="cs-h3"><?php the_title(); ?></h3>
                        </a>
                        <img class="cs-arrow" loading="lazy" decoding="async"
                            src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/Icon.svg"
                            alt="arrow" width="24" height="24" aria-hidden="true">
                    </div>
                </div>
                <?php $count++; ?>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>

						</div>
					</section>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. 
			?> -->

<?php
get_footer();
