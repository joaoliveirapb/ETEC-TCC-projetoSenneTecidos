<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Galway Lite
 */

get_header();global $post;
$galway_ed_post_rating = esc_html( get_post_meta( $post->ID, 'galway_ed_post_rating', true ) );

 ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main <?php if( $galway_ed_post_rating ){ echo 'galway-no-comment'; } ?>" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <?php
                $format = get_post_format();
                $format = (false === $format) ? 'single' : $format;
                ?>
                <?php get_template_part('template-parts/content', $format); ?>

                <?php
                // Previous/next post navigation.
                the_post_navigation(array(
                    'next_text' => '<span class="screen-reader-text">' . esc_html__('Next post:', 'galway-lite') . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="screen-reader-text">' . esc_html__('Previous post:', 'galway-lite') . '</span> ' .
                        '<span class="post-title">%title</span>',
                ));
                
                /**
                 * Navigation
                 * 
                 * @hooked galway_lite_post_floating_nav - 10
                */

                do_action('galway_lite_navigation_action');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar();
get_footer();
