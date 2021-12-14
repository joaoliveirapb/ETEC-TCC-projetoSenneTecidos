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
if( $galway_ed_post_like_dislike ){ galway_lite_disable_post_like_dislike(); }
?>

<article id="post-<?php the_ID();?>" <?php post_class();
?>>
    <div class="pb-30 mb-60 twp-article-wrapper clearfix">

    <?php if ( !is_single() ) { ?>

		<header class="article-header text-center">

			

			<?php if ( has_category( '',get_the_ID() ) ) { ?>

				<div class="post-category secondary-font">
					<span class="meta-span">
						<?php galway_lite_entry_category();?>
					</span>
				</div>

			<?php } ?>

			<h2 class="entry-title">
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h2>

		</header>

        <div class="entry-meta text-uppercase">
			<?php
			galway_lite_posted_details();
			if( !$galway_ed_post_views ){ galway_lite_post_view_count(); }
			?>
		</div><!-- .entry-meta -->

		<?php
		$archive_layout = galway_lite_get_option('archive_layout');

		$archive_layout_image = galway_lite_get_option('archive_layout_image');
		if ('full' == $archive_layout_image) {

			$full_width_content = 'archive-image-full';

		} else {
			$full_width_content = 'twp-archive-lr';
		}
		?>
		<div class="entry-content twp-entry-content <?php echo esc_attr($full_width_content);?>">

			<?php
			$archive_layout = galway_lite_get_option('archive_layout');
			$archive_layout_image = galway_lite_get_option('archive_layout_image'); ?>

			<?php if( has_post_thumbnail() ):

				if ('left' == $archive_layout_image) {

					echo "<div class='twp-image-archive image-left'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				} elseif ('right' == $archive_layout_image) {

					echo "<div class='twp-image-archive image-right'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				} elseif ('full' == $archive_layout_image) {

					echo "<div class='twp-image-archive image-full'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				} else {

					echo "<div>";

				}

				echo "</a></div>";/*div end*/

			endif; ?>

			<?php if ('full' == $archive_layout): ?>

			<div class="twp-text-align">

				<?php
				$read_more_text = esc_html(galway_lite_get_option('read_more_button_text'));
				the_content(sprintf(
					/* translators: %s: Name of current post. */
					wp_kses($read_more_text, __('%s <i class="ion-ios-arrow-right read-more-right"></i>', 'galway-lite'), array('span' => array('class' => array()))),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				));?>
			                    <?php wp_link_pages(array(
					'before' => '<div class="page-links">'.esc_html__('Pages:', 'galway-lite'),
					'after'  => '</div>',
				)); 
				if ( !class_exists('Booster_Extension_Class') && is_sinle() ) {

	                wp_link_pages(array(
	                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'galway-lite'),
	                    'after' => '</div>',
	                ));

	            } 
	            ?>
			</div>

			<?php  else :?>

				<div class="twp-text-align">
					<?php the_excerpt(); 
					galway_lite_excerpt_more();?>
				</div>

			<?php endif?>

		</div><!-- .entry-content -->

	<?php
	} else { ?>

		<div class="entry-content">

			<?php
			$image_values = get_post_meta( $post->ID, 'galway-lite-meta-image-layout', true);
			if ( empty( $image_values ) ) {

				$values = esc_attr( galway_lite_get_option('single_post_image_layout') );

			} else {

				$values = esc_attr( $image_values );

			}

			if ('no-image' != $values) {

				if ('left' == $values) {

					echo "<div class='image-left'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				} elseif ('right' == $values) {

					echo "<div class='image-right'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				} else {

					echo "<div class='image-full'>";?>
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
					<?php the_post_thumbnail('full');

				}
				echo "</a></div>";/*div end */
			}
			?>

			<div class="twp-text-align">
				<?php the_content();?>
			</div>

			<?php
			if ( !class_exists('Booster_Extension_Class') ) {

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'galway-lite'),
                    'after' => '</div>',
                ));

            } 
			?>

		</div><!-- .entry-content -->

	<?php
	} ?>

	</div>
</article><!-- #post-## -->
