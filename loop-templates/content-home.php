<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php echo do_shortcode('[category_ticker category="news" limit="5"]'); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


	<div class="entry-content">
        
    <?php
        $args = array(
            'posts_per_page' => 5,
            'post_status'    => 'publish',
        );
        $the_query = new WP_Query($args);

        $posts = array();
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                $posts[] = array(
                    'title'     => get_the_title(),
                    'link'      => get_permalink(),
                    'excerpt'   => get_the_excerpt(),
                    'thumbnail' => get_the_post_thumbnail(null, 'full'),
                );
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

<div id="home-grid">
    <div class="post-pattern">
    <?php
    // Define the structure for each column (number of boxes per column)
    $columns = [
        ['col col-1', 2],
        ['col col-2', 1],
        ['col col-3', 2],
    ];
    $post_index = 0;
    foreach ($columns as $col) :
        list($col_class, $box_count) = $col;
        ?>
        <div class="<?php echo esc_attr($col_class); ?>">
            <?php for ($i = 0; $i < $box_count; $i++) : ?>
                <?php if (!empty($posts[$post_index])) : 
                    $p = $posts[$post_index];
                    // Extract the image URL from the thumbnail HTML
                    if (preg_match('/src="([^"]+)"/', $p['thumbnail'], $matches)) {
                        $img_url = $matches[1];
                    } else {
                        $img_url = '';
                    }
                ?>
                    <div class="box<?php echo ($col_class === 'col col-2') ? ' large' : ''; ?>"
                        <?php if ($img_url) : ?>
                            style="background-image: url('<?php echo esc_url($img_url); ?>');"
                        <?php endif; ?>
                    >
                        <a href="<?php echo esc_url($p['link']); ?>">
                            <div class="box-content">
                                <h3 class="entry-title"><?php echo esc_html($p['title']); ?></h3>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php $post_index++; ?>
            <?php endfor; ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>



	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
