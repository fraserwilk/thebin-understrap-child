<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

    <article <?php post_class('g-col-md-6 g-col-lg-4 g-col-12 card'); ?> id="post-<?php the_ID(); ?>">
    
        <header class="card-header">
        <?php if ( 'post' === get_post_type() ) : ?>
                <div class="category">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                </div>

                <?php understrap_posted_on(); ?>
            <?php endif; ?>
        </header>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="card-img">
                <?php the_post_thumbnail( 'large', ['class' => 'img-fluid'] ); ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <?php the_title( sprintf( '<h3 class="card-title"><a href="%s" rel="bookmark" class="card-title-link">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </div>

        <footer class="card-footer">
            <a href="<?php the_permalink(); ?>" class="card-link">
                <?php esc_html_e( 'Read More ->', 'understrap' ); ?>
            </a>
        </footer>

    </article>

<!-- #post-<?php the_ID(); ?> -->
