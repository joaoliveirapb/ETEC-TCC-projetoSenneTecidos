<?php
/**
 * Template part for displaying single posts.
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
if( $galway_ed_post_like_dislike ){ galway_lite_disable_post_like_dislike(); }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<div class="entry-content">
    <div class="pb-30 mb-40 twp-article-wrapper clearfix">
<?php if (!is_single()) {?>
	<header class="entry-header">
	                <div class="entry-meta entry-inner">
	<?php
	galway_lite_posted_details();
	if( !$galway_ed_post_views ){ galway_lite_post_view_count(); }
	?>
	</div><!-- .entry-meta -->
	            </header><!-- .entry-header -->
	<?php }?>
        <?php
$image_values = get_post_meta($post->ID, 'galway-lite-meta-image-layout', true);
if (empty($image_values)) {
	$values = esc_attr(galway_lite_get_option('single_post_image_layout'));
} else {
	$values = esc_attr($image_values);
}
if ('no-image' != $values) {
	if ('left' == $values) {
		echo "<div class='image-left'>";
		the_post_thumbnail('medium');
	} elseif ('right' == $values) {
		echo "<div class='image-right'>";
		the_post_thumbnail('medium');
	} else {
		echo "<div class='image-full'>";
		the_post_thumbnail('full');
	}
	echo "</div>";/*div end */
}

?>
<div class="entry-content twp-entry-content">

    <?php if( is_singular() && empty( $galway_ed_post_social_share ) && class_exists( 'Booster_Extension_Class' ) && 'post' === get_post_type() ){ ?>

        <div class="post-content-share">
            <?php echo do_shortcode('[booster-extension-ss layout="layout-1" status="enable"]'); ?>
        </div>

    <?php } ?>

    <div class="post-content">

        <div class="entry-content">

            <?php
            if( !is_singular() ){

	            echo '<p>';
            	
                if( has_excerpt() ){

                    echo esc_html( get_the_excerpt() );

                }else{

                    echo esc_html( wp_trim_words( get_the_content(),25,'...' ) );

                }

                galway_lite_excerpt_more();

                echo '</p>';

            }else{

            	the_content( );

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

</div>
</div><!-- .entry-content -->
<?php if (is_single()) {?>
	<div class="single-meta">
	<?php if (has_category('', $post->ID)) {?>
		<footer class="entry-footer alternative-bgcolor">
		<?php galway_lite_entry_category();?>
		</footer><!-- .entry-footer -->
		<?php }?>
	    <?php if (has_tag()) {?>
		<div class="post-tags alternative-bgcolor">
		<?php galway_lite_entry_tags();?>
		</div>
		<?php }?>
	</div>
	<?php }?>
</article><!-- #post-## -->