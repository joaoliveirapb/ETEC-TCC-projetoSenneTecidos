<?php
if ( !class_exists('Galway_Lite_Dashboard_Notice') ):

    class Galway_Lite_Dashboard_Notice
    {
        function __construct()
        {	
            global $pagenow;

        	if( $this->galway_lite_show_hide_notice() ){

	            if( is_multisite() ){

                  add_action( 'network_admin_notices',array( $this,'galway_lite_admin_notiece' ) );

                } else {

                  add_action( 'admin_notices',array( $this,'galway_lite_admin_notiece' ) );
                }
	        }
            
	        add_action( 'wp_ajax_galway_lite_notice_dismiss', array( $this, 'galway_lite_notice_dismiss' ) );
			add_action( 'switch_theme', array( $this, 'galway_lite_notice_clear_cache' ) );
            add_action('admin_init', array( $this, 'galway_lite__notice_remove' ),100);

        }
        
        function galway_lite__notice_remove(){
            if( isset( $_GET['page'] ) && $_GET['page'] == get_template().'-about' ){

                remove_all_actions('admin_notices');
                remove_all_actions('all_admin_notices');
            }
        }
        
        public static function galway_lite_show_hide_notice( $status = false ){

            if( $status ){

                if( (class_exists( 'Booster_Extension_Class' ) ) || get_option('twp_galway_lite_admin_notice') ){

                    return false;

                }else{

                    return true;

                }

            }

            // Check If current Page 
            if ( isset( $_GET['page'] ) && $_GET['page'] == 'galway-lite-about'  ) {
                return false;
            }

        	// Hide if dismiss notice
        	if( get_option('twp_galway_lite_admin_notice') ){
				return false;
			}
        	// Hide if all plugin active
        	if ( class_exists( 'Booster_Extension_Class' ) ) {
				return false;
			}
			// Hide On TGMPA pages
			if ( ! empty( $_GET['tgmpa-nonce'] ) ) {
				return false;
			}
			// Hide if user can't access
        	if ( current_user_can( 'manage_options' ) ) {
				return true;
			}
			
        }

        // Define Global Value
        public static function galway_lite_admin_notiece(){

            ?>

            <div class="updated notice is-dismissible welcome-panel twp-galway-lite-notice">

                <h3><?php esc_html_e('Quick Setup','galway-lite'); ?></h3>

                <p><strong><?php esc_html_e('Galway Lite is now installed and ready to use. Are you looking for a better experience to set up your site?','galway-lite'); ?></strong></p>

                <small><?php esc_html_e("We've prepared a unique onboarding process through our",'galway-lite'); ?> <a href="<?php echo esc_url( admin_url().'themes.php?page='.get_template().'-about') ?>"><?php esc_html_e('Getting started','galway-lite'); ?></a> <?php esc_html_e("page. It helps you get started and configure your upcoming website with ease. Let's make it shine!",'galway-lite'); ?></small>

                <p>
                    <a class="button button-primary twp-install-active" href="javascript:void(0)"><?php esc_html_e('Install and activate recommended plugins','galway-lite'); ?></a>
                    <span class="quick-loader-wrapper"><span class="quick-loader"></span></span>

                    <a target="_blank" class="button button-primary" href="<?php echo esc_url( 'https://demo.themeinwp.com/galway-lite/' ); ?>"><?php esc_html_e('View Demo','galway-lite'); ?></a>
                    <a target="_blank" class="button button-primary button-primary-upgrade" href="<?php echo esc_url( 'https://1.envato.market/DrnKa' ); ?>"><?php esc_html_e('Upgrade to Pro','galway-lite'); ?></a>
                    <a class="btn-dismiss twp-custom-setup" href="javascript:void(0)"><?php esc_html_e('Dismiss this notice.','galway-lite'); ?></a>

                </p>

            </div>

        <?php
        }

        public function galway_lite_notice_dismiss(){

        	if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ '_wpnonce' ] ) ), 'galway_lite_ajax_nonce' ) ) {

	        	update_option('twp_galway_lite_admin_notice','hide');

	        }

            die();

        }

        public function galway_lite_notice_clear_cache(){

        	update_option('twp_galway_lite_admin_notice','');

        }

    }
    new Galway_Lite_Dashboard_Notice();
endif;