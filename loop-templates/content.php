<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('col-12 col-md-4 col-lg-3 card m-2 p-2 border'); ?> id="post-<?php the_ID(); ?>">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card-img">
            <?php
            the_post_thumbnail( 'large', [
                'class' => 'img-fluid post-thumb rounded-top',
                'loading' => 'lazy',
                'decoding' => 'async',
            ] );
            ?>
        </div>
    <?php endif; ?>

    <header class="card-header">
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="category text-muted small mb-1">
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="text-decoration-none">' . esc_html( $categories[0]->name ) . '</a>';
                }
                ?>
            </div>
            <?php understrap_posted_on(); ?>
        <?php endif; ?>
    </header>

    <div class="card-body">
        <?php the_title( sprintf(
            '<h3 class="card-title mb-2"><a href="%s" rel="bookmark" class="card-title-link text-dark">', 
            esc_url( get_permalink() )
        ), '</a></h3>' ); ?>
    </div>

    <footer class="card-footer bg-white border-top">
        <a href="<?php the_permalink(); ?>" class="card-link text-primary fw-bold">
            <?php esc_html_e( 'Read More →', 'understrap' ); ?>
        </a>
    </footer>

</article>
