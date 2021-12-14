<?php
if (!function_exists('galway_lite_the_custom_logo')):
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Galway 1.0.0
 */
function galway_lite_the_custom_logo() {
	if (function_exists('the_custom_logo')) {
		the_custom_logo();
	}
}
endif;

if (!function_exists('galway_lite_body_class')):

/**
 * body class.
 *
 * @since 1.0.0
 */
function galway_lite_body_class($galway_lite_body_class) {
	global $post;
	$global_layout       = galway_lite_get_option('global_layout');
	$input               = '';
	$home_content_status = galway_lite_get_option('home_page_content_status');
	if (1 != $home_content_status) {
		$input = 'home-content-not-enabled';
	}
	// Check if single.
	if ($post && is_singular()) {
		$post_options = get_post_meta($post->ID, 'galway-lite-meta-select-layout', true);
		if (empty($post_options)) {
			$global_layout = esc_attr(galway_lite_get_option('global_layout'));
		} else {
			$global_layout = esc_attr($post_options);
		}
	}
	if ($global_layout == 'left-sidebar') {
		$galway_lite_body_class[] = 'left-sidebar '.esc_attr($input);
	} elseif ($global_layout == 'no-sidebar') {
		$galway_lite_body_class[] = 'no-sidebar '.esc_attr($input);
	} else {
		$galway_lite_body_class[] = 'right-sidebar '.esc_attr($input);

	}
	return $galway_lite_body_class;
}
endif;

add_action('body_class', 'galway_lite_body_class');

add_action('galway_lite_action_sidebar', 'galway_lite_add_sidebar');

/**
 * Returns word count of the sentences.
 *
 * @since Galway 1.0.0
 */
if (!function_exists('galway_lite_words_count')):
function galway_lite_words_count($length = 25, $galway_lite_content = null) {
	$length          = absint($length);
	$source_content  = preg_replace('`\[[^\]]*\]`', '', $galway_lite_content);
	$trimmed_content = wp_trim_words($source_content, $length, '');
	return $trimmed_content;
}
endif;

if (!function_exists('galway_lite_simple_breadcrumb')):

/**
 * Simple breadcrumb.
 *
 * @since 1.0.0
 */
function galway_lite_simple_breadcrumb() {

	if (!function_exists('breadcrumb_trail')) {

		require_once get_template_directory().'/assets/libraries/breadcrumbs/breadcrumbs.php';
	}

	$breadcrumb_args = array(
		'container'   => 'div',
		'show_browse' => false,
	);
	breadcrumb_trail($breadcrumb_args);

}

endif;

if (!function_exists('galway_lite_custom_posts_navigation')):
/**
 * Posts navigation.
 *
 * @since 1.0.0
 */
function galway_lite_custom_posts_navigation() {

	$pagination_type = galway_lite_get_option('pagination_type');

	switch ($pagination_type) {

		case 'default':
			the_posts_navigation();
			break;

		case 'numeric':
			the_posts_pagination();
			break;

		default:
			break;
	}

}
endif;

add_action('galway_lite_action_posts_navigation', 'galway_lite_custom_posts_navigation');

if (!function_exists('galway_lite_excerpt_length')):

/**
 * Excerpt length
 *
 * @since  Galway 1.0.0
 *
 * @param null
 * @return int
 */
function galway_lite_excerpt_length($length) {
	if (is_admin()) {
	    return $length;
	}
	global $galway_lite_customizer_all_values;
	$excerpt_length = isset( $galway_lite_customizer_all_values['excerpt_length_global'] ) ? $galway_lite_customizer_all_values['excerpt_length_global'] : '';
	if (empty($excerpt_length)) {
		$excerpt_length = $length;
	}
	return absint($excerpt_length);

}

add_filter('excerpt_length', 'galway_lite_excerpt_length', 999);
endif;

if (!function_exists('galway_lite_excerpt_more')):

/**
 * Implement read more in excerpt.
 *
 * @since 1.0.0
 *
 * @param string $more The string shown within the more link.
 * @return string The excerpt.
 */
function galway_lite_excerpt_more() {

	$read_more_text = esc_html(galway_lite_get_option('read_more_button_text'));
	if (!empty($read_more_text)) {
		$output = ' <a href="'.esc_url(get_permalink()).'" class="read-more">'.esc_html($read_more_text).'<i class="ion-ios-arrow-right"></i>'.'</a>';
		$output = apply_filters('galway_lite_filter_read_more_link', $output);
	}
	echo $output;

}

endif;

if (!function_exists('galway_lite_get_link_url')):

/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since 1.0.0
 *
 * @return string The Link format URL.
 */
function galway_lite_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content($content);

	return ($has_url)?$has_url:apply_filters('the_permalink', get_permalink());
}

endif;

if (!function_exists('galway_lite_fonts_url')):

/**
 * Return fonts URL.
 *
 * @since 1.0.0
 * @return string Fonts URL.
 */
function galway_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	$galway_lite_primary_font   = galway_lite_get_option('primary_font');
	$galway_lite_secondary_font = galway_lite_get_option('secondary_font');

	$galway_lite_fonts   = array();
	$galway_lite_fonts[] = $galway_lite_primary_font;
	$galway_lite_fonts[] = $galway_lite_secondary_font;

	$galway_lite_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

	$i = 0;
	for ($i = 0; $i < count($galway_lite_fonts); $i++) {

		if ('off' !== sprintf(_x('on', '%s font: on or off', 'galway-lite'), $galway_lite_fonts[$i])) {
			$fonts[] = $galway_lite_fonts[$i];
		}

	}

	if ($fonts) {
		$fonts_url = add_query_arg(array(
				'family' => urldecode(implode('|', $fonts)),
			), 'https://fonts.googleapis.com/css');
	}

	return $fonts_url;
}

endif;


function galway_lite_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'galway_lite_archive_title' );

/*Recomended plugin*/
if( ! function_exists( 'galway_recommended_plugins' ) ) :

  /**
   * Recommended plugins
   *
   */
  function galway_lite_recommended_plugins(){
      $galway_plugins = array(
        array(
          'name'     => esc_html__('Booster Extension', 'galway-lite'),
          'slug'     => 'booster-extension',
          'required' => false,
        ),
      );
      $galway_plugins_config = array(
          'dismissable' => true,
      );
      
      tgmpa( $galway_plugins, $galway_plugins_config );
  }
endif;
add_action( 'tgmpa_register', 'galway_lite_recommended_plugins' );

if( !function_exists('galway_lite_disable_post_views') ):

    /** Disable Post Views **/
    function galway_lite_disable_post_views() {

        add_filter('booster_extension_filter_views_ed', function ( ) {
            return false;
        });

    }
endif;

if( !function_exists('galway_lite_disable_post_read_time') ):

    /** Disable Read Time **/
    function galway_lite_disable_post_read_time() {

        add_filter('booster_extension_filter_readtime_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('galway_lite_disable_post_like_dislike') ):

    /** Disable Like Dislike **/
    function galway_lite_disable_post_like_dislike() {

        add_filter('booster_extension_filter_like_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists('galway_lite_disable_post_author_box') ):

    /** Disable Author Box **/
    function galway_lite_disable_post_author_box() {

        add_filter('booster_extension_filter_ab_ed', function ( ) {
            return false;
        },30,1);

    }

endif;

if( !function_exists('galway_lite_disable_post_post_rating') ):

    /** Disable Author Box **/
    function galway_lite_disable_post_post_rating() {

        add_filter('twp_enable_post_rating_filter', function ( ) {
            return false;
        });

    }

endif;

add_filter('booster_extension_filter_ss_ed', function ( ) {
    return false;
});

if( !function_exists('galway_lite_disable_post_reaction') ):

    /** Disable Reaction **/
    function galway_lite_disable_post_reaction() {

        add_filter('booster_extension_filter_reaction_ed', function ( ) {
            return false;
        });

    }

endif;

if( !function_exists( 'galway_lite_post_view_count' ) ):

    function galway_lite_post_view_count(){

        $twp_be_settings = get_option('twp_be_options_settings');
        $twp_be_enable_post_visit_tracking = isset( $twp_be_settings[ 'twp_be_enable_post_visit_tracking' ] ) ? esc_html( $twp_be_settings[ 'twp_be_enable_post_visit_tracking' ] ) : '';
                
        if( class_exists( 'Booster_Extension_Class' ) && $twp_be_enable_post_visit_tracking ): ?>

            <div class="entry-meta-item entry-meta-views">
                <div class="entry-meta-wrapper">
                    
                        <span class="entry-meta-icon views-icon">
                            <i class="ion-eye"></i>
                        </span>
                        <a href="<?php the_permalink(); ?>">
                            <span class="post-view-count">
                               <?php
                               echo do_shortcode('[booster-extension-visit-count count_only="count" label="'.esc_html__('Views','galway-lite').'"]');
                               ?>
                            </span>
                         </a>
                </div>
            </div>
        
        <?php
        endif;
    }
endif;

if ( ! function_exists( 'galway_lite_iframe_escape' ) ) :
    /** Escape Iframe **/
    function galway_lite_iframe_escape( $input ){

        $all_tags = array(
            'iframe'=>array(
                'width'=>array(),
                'height'=>array(),
                'src'=>array(),
                'frameborder'=>array(),
                'allow'=>array(),
                'allowfullscreen'=>array(),
            )
        );

        return wp_kses($input,$all_tags);
        
    }

endif;

if( class_exists( 'Booster_Extension_Class' ) ){

    add_filter('booster_extemsion_content_after_filter','galway_lite_after_content_pagination');

}


if( !function_exists('galway_lite_after_content_pagination') ):

    function galway_lite_after_content_pagination($after_content){

        $pagination_single = wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'galway-lite' ),
                    'after'  => '</div>',
                    'echo' => false
                ) );

        $after_content =  $pagination_single.$after_content;

        return $after_content;

    }

endif;

if( !function_exists('galway_lite_post_floating_nav') ):

    function galway_lite_post_floating_nav(){

        $default = galway_lite_get_default_theme_options();
        $ed_floating_next_previous_nav = get_theme_mod( 'ed_floating_next_previous_nav',$default['ed_floating_next_previous_nav'] );

        if( 'post' === get_post_type() && $ed_floating_next_previous_nav ){

            $next_post = get_next_post();
            $prev_post = get_previous_post();

            if( isset( $prev_post->ID ) ){

                $prev_link = get_permalink( $prev_post->ID );?>

                <div class="floating-post-navigation floating-navigation-prev">
                    <?php if( get_the_post_thumbnail( $prev_post->ID,'medium' ) ){ ?>
                            <?php echo wp_kses_post( get_the_post_thumbnail( $prev_post->ID,'medium' ) ); ?>
                    <?php } ?>
                    <a href="<?php echo esc_url( $prev_link ); ?>">
                        <span class="floating-navigation-label"><?php echo esc_html__('Previous post', 'galway-lite'); ?></span>
                        <span class="floating-navigation-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
                    </a>
                </div>

            <?php }

            if( isset( $next_post->ID ) ){

                $next_link = get_permalink( $next_post->ID );?>

                <div class="floating-post-navigation floating-navigation-next">
                    <?php if( get_the_post_thumbnail( $next_post->ID,'medium' ) ){ ?>
                        <?php echo wp_kses_post( get_the_post_thumbnail( $next_post->ID,'medium' ) ); ?>
                    <?php } ?>
                    <a href="<?php echo esc_url( $next_link ); ?>">
                        <span class="floating-navigation-label"><?php echo esc_html__('Next post', 'galway-lite'); ?></span>
                        <span class="floating-navigation-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
                    </a>
                </div>

            <?php
            }

        }

    }

endif;

add_action( 'galway_lite_navigation_action','galway_lite_post_floating_nav',10 );