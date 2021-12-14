<?php
/**
 * Implement theme metabox.
 *
 * @package Galway Lite
 */

if (!function_exists('galway_lite_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function galway_lite_add_theme_meta_box()
    {

        $apply_metabox_post_types = array('post', 'page');

        foreach ($apply_metabox_post_types as $key => $type) {
            add_meta_box(
                'galway-lite-theme-settings',
                esc_html__('Single Page/Post Settings', 'galway-lite'),
                'galway_lite_render_theme_settings_metabox',
                $type
            );
        }

    }

endif;

add_action('add_meta_boxes', 'galway_lite_add_theme_meta_box');

if (!function_exists('galway_lite_render_theme_settings_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function galway_lite_render_theme_settings_metabox($post, $metabox)
    {

        $post_id = $post->ID;
        $post_type = get_post_type($post->ID);
        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'galway_lite_meta_box_nonce');
        // Fetch Options list.
        $galway_lite_meta_checkbox = esc_attr(get_post_meta($post->ID, 'galway-lite-meta-checkbox', true));
        $page_layout = get_post_meta($post_id, 'galway-lite-meta-select-layout', true);
        $page_image_layout = get_post_meta($post_id, 'galway-lite-meta-image-layout', true);
        ?>
        
        <div class="galway-tab-main">
            <div class="galway-metabox-tab">
                <ul>
                    <li>
                        <a id="galway-tab-layout" class="galway-tab-active" href="javascript:void(0)"><?php esc_html_e('Layout Settings', 'galway-lite'); ?></a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'galway-lite'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="galway-tab-content">
                <div id="galway-tab-layout-content" class="galway-content-wrap galway-tab-content-active">

                    <h3 class="galway-meta-title"><?php esc_html_e('Single Post Page Settings', 'galway-lite'); ?></h3>

                    <div class="galway-meta-panels">

                        <div class="galway-opt-wrap galway-checkbox-wrap">
                            <input id="galway-lite-meta-checkbox" name="galway-lite-meta-checkbox" type="checkbox" <?php if ($galway_lite_meta_checkbox) { ?> checked="checked" <?php } ?> />
                            <label for="galway-lite-meta-checkbox"><?php esc_html_e('Check To Use Featured Image As Banner Image', 'galway-lite'); ?></label>
                        </div>

                        <div class="galway-opt-wrap galway-opt-wrap-alt">

                            <label><?php esc_html_e('Single Page/Post Layout', 'galway-lite'); ?></label>
                            <select name="galway-lite-meta-select-layout">

                                <option value="left-sidebar" <?php selected('left-sidebar', $page_layout); ?>>
                                    <?php _e('Primary Sidebar - Content', 'galway-lite') ?>
                                </option>
                                <option value="right-sidebar" <?php selected('right-sidebar', $page_layout); ?>>
                                    <?php _e('Content - Primary Sidebar', 'galway-lite') ?>
                                </option>
                                <option value="no-sidebar" <?php selected('no-sidebar', $page_layout); ?>>
                                    <?php _e('No Sidebar', 'galway-lite') ?>
                                </option>

                            </select>

                        </div>

                        <div class="galway-opt-wrap galway-opt-wrap-alt">

                            <label><?php esc_html_e('Single Page/Post Image Layout', 'galway-lite'); ?></label>
                            <select name="galway-lite-meta-image-layout">

                                <option value="full" <?php selected('full', $page_image_layout); ?>>
                                        <?php _e('Full', 'galway-lite') ?>
                                </option>
                                <option value="left" <?php selected('left', $page_image_layout); ?>>
                                    <?php _e('Left', 'galway-lite') ?>
                                </option>
                                <option value="right" <?php selected('right', $page_image_layout); ?>>
                                    <?php _e('Right', 'galway-lite') ?>
                                </option>
                                <option value="no-image" <?php selected('no-image', $page_image_layout); ?>>
                                    <?php _e('No Image', 'galway-lite') ?>
                                </option>

                            </select>

                        </div>

                        
                    </div>

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $galway_ed_post_views = esc_html( get_post_meta( $post->ID, 'galway_ed_post_views', true ) );
                    $galway_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'galway_ed_post_read_time', true ) );
                    $galway_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'galway_ed_post_like_dislike', true ) );
                    $galway_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'galway_ed_post_author_box', true ) );
                    $galway_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'galway_ed_post_social_share', true ) );
                    $galway_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'galway_ed_post_reaction', true ) );
                    $galway_ed_post_rating = esc_html( get_post_meta( $post->ID, 'galway_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="galway-content-wrap">

                        <div class="galway-meta-panels">

                            <h3 class="galway-meta-title"><?php esc_html_e('Booster Extension Plugin Content','galway-lite'); ?></h3>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-views" name="galway_ed_post_views" value="1" <?php if( $galway_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-views"><?php esc_html_e( 'Disable Post Views','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-read-time" name="galway_ed_post_read_time" value="1" <?php if( $galway_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-like-dislike" name="galway_ed_post_like_dislike" value="1" <?php if( $galway_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-author-box" name="galway_ed_post_author_box" value="1" <?php if( $galway_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-social-share" name="galway_ed_post_social_share" value="1" <?php if( $galway_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-reaction" name="galway_ed_post_reaction" value="1" <?php if( $galway_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','galway-lite' ); ?></label>

                            </div>

                            <div class="galway-opt-wrap galway-checkbox-wrap">

                                    <input type="checkbox" id="galway-ed-post-rating" name="galway_ed_post_rating" value="1" <?php if( $galway_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="galway-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','galway-lite' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </div>


        <?php
    }

endif;


if (!function_exists('galway_lite_save_theme_settings_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function galway_lite_save_theme_settings_meta($post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['galway_lite_meta_box_nonce']) || !wp_verify_nonce($_POST['galway_lite_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $post_id) {
            return;
        }

        // Check permission.
        if ('page' === $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $galway_lite_meta_checkbox = isset($_POST['galway-lite-meta-checkbox']) ? esc_attr($_POST['galway-lite-meta-checkbox']) : '';
        update_post_meta($post_id, 'galway-lite-meta-checkbox', sanitize_text_field($galway_lite_meta_checkbox));

        $galway_lite_meta_select_layout = isset($_POST['galway-lite-meta-select-layout']) ? esc_attr($_POST['galway-lite-meta-select-layout']) : '';
        if (!empty($galway_lite_meta_select_layout)) {
            update_post_meta($post_id, 'galway-lite-meta-select-layout', sanitize_text_field($galway_lite_meta_select_layout));
        }
        $galway_lite_meta_image_layout = isset($_POST['galway-lite-meta-image-layout']) ? esc_attr($_POST['galway-lite-meta-image-layout']) : '';
        if (!empty($galway_lite_meta_image_layout)) {
            update_post_meta($post_id, 'galway-lite-meta-image-layout', sanitize_text_field($galway_lite_meta_image_layout));
        }


        $galway_ed_post_views = isset($_POST['galway_ed_post_views']) ? esc_attr($_POST['galway_ed_post_views']) : '';
        update_post_meta($post_id, 'galway_ed_post_views', sanitize_text_field($galway_ed_post_views));

        $galway_ed_post_read_time = isset($_POST['galway_ed_post_read_time']) ? esc_attr($_POST['galway_ed_post_read_time']) : '';
        update_post_meta($post_id, 'galway_ed_post_read_time', sanitize_text_field($galway_ed_post_read_time));

        $galway_ed_post_like_dislike = isset($_POST['galway_ed_post_like_dislike']) ? esc_attr($_POST['galway_ed_post_like_dislike']) : '';
        update_post_meta($post_id, 'galway_ed_post_like_dislike', sanitize_text_field($galway_ed_post_like_dislike));

        $galway_ed_post_author_box = isset($_POST['galway_ed_post_author_box']) ? esc_attr($_POST['galway_ed_post_author_box']) : '';
        update_post_meta($post_id, 'galway_ed_post_author_box', sanitize_text_field($galway_ed_post_author_box));

        $galway_ed_post_social_share = isset($_POST['galway_ed_post_social_share']) ? esc_attr($_POST['galway_ed_post_social_share']) : '';
        update_post_meta($post_id, 'galway_ed_post_social_share', sanitize_text_field($galway_ed_post_social_share));

        $galway_ed_post_reaction = isset($_POST['galway_ed_post_reaction']) ? esc_attr($_POST['galway_ed_post_reaction']) : '';
        update_post_meta($post_id, 'galway_ed_post_reaction', sanitize_text_field($galway_ed_post_reaction));

        $galway_ed_post_rating = isset($_POST['galway_ed_post_rating']) ? esc_attr($_POST['galway_ed_post_rating']) : '';
        update_post_meta($post_id, 'galway_ed_post_rating', sanitize_text_field($galway_ed_post_rating));

    }

endif;

add_action('save_post', 'galway_lite_save_theme_settings_meta', 10, 3);