<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galway Lite
 */
galway_lite_disable_post_views();
$galway_ed_post_views = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_views', true ) );
$galway_ed_post_read_time = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_read_time', true ) );
$galway_ed_post_author_box = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_author_box', true ) );
$galway_ed_post_social_share = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_social_share', true ) );
$galway_ed_post_reaction = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_reaction', true ) );
$galway_ed_post_like_dislike = esc_html( get_post_meta( get_the_ID(), 'galway_ed_post_like_dislike', true ) );

if( $galway_ed_post_read_time ){ galway_lite_disable_post_read_time(); }
if( $galway_ed_post_author_box ){ galway_lite_disable_post_author_box(); }
if( $galway_ed_post_reaction ){ galway_lite_disable_post_reaction(); }
if( $galway_ed_post_like_dislike || !is_single() ){ galway_lite_disable_post_like_dislike(); }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="pb-30 mb-60 twp-article-wrapper clearfix">
    <?php if (!is_single()) { ?>
        <header class="article-header text-center">

            <?php if (has_category('',get_the_ID())) { ?>

                <div class="post-category secondary-font">
                    <span class="meta-span">
                        <?php galway_lite_entry_category(); ?>
                    </span>
                </div>

            <?php } ?>
        
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <div class="entry-meta text-uppercase">
                <?php
                galway_lite_posted_details();
                if( !$galway_ed_post_views ){ galway_lite_post_view_count(); }
                ?>
            </div><!-- .entry-meta -->
        </header>
    <?php } ?>

        <div class="entry-content twp-entry-content">

            <?php if( is_singular() && empty( $galway_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>

                <div class="post-content-share">
                    <?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
                </div>

            <?php } ?>

            <div class="post-content">

                <div class="entry-content">

                    <?php
                    if( !is_single() ){ ?>

                        <div class="galway-content galway-content-gallery">

                            <?php
                            if ( ( function_exists('has_block') && has_block('gallery', get_the_content() ) ) || get_post_gallery() ) {
                
                                if ( function_exists('has_block') && has_block('gallery', get_the_content()) ) {

                                    $post_blocks = parse_blocks( get_the_content() );
                                    if( $post_blocks ){
                                        foreach( $post_blocks as $post_block ){

                                            if( isset( $post_block['blockName'] ) && 
                                                isset( $post_block['innerHTML'] ) && 
                                                $post_block['blockName'] == 'core/gallery' ){

                                                echo '<div class="entry-gallery">';
                                                echo wp_kses_post( $post_block['innerHTML'] );
                                                echo '</div>';
                                                break;

                                            }
                                        }
                                    }

                                }else{

                                    if( get_post_gallery() ){
                                        echo '<div class="entry-gallery">';
                                        echo wp_kses_post( get_post_gallery() );
                                        echo '</div>';
                                    }
                                }
                                
                            }else{
                                if(  get_the_post_thumbnail() ){ ?>
                                    <div class="post-thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php }
                            }

                            ?>
                        </div>
                            <?php
                    }
                    if( is_singular() ){

                        the_content();

                        if ( !class_exists('Booster_Extension_Class') ) {

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'galway-lite'),
                                'after' => '</div>',
                            ));

                        } 

                    } ?>

                </div>

            </div>

        </div>

        <?php if (is_single()) { ?>
            <div class="single-meta">
            <?php if (has_category('',$post->ID)) { ?>
                <footer class="entry-footer alternative-bgcolor">
                    <?php galway_lite_entry_category(); ?>
                </footer><!-- .entry-footer -->
            <?php } ?>
            <?php if(has_tag()) { ?>
                <div class="post-tags alternative-bgcolor">
                    <?php galway_lite_entry_tags(); ?>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</article><!-- #post-## -->
