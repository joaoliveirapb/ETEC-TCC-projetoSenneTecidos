<?php
/**
 * About class
 *
 * @package Galway_Lite
 */

if (!class_exists('Galway_Lite_About')) {

    /**
     * Main class.
     *
     * @since 1.0.0
     */
    class Galway_Lite_About
    {

        /**
         * Version
         *
         * @var string $version Class version.
         *
         * @since 1.0.0
         */
        private $version = '1.0.0';

        /**
         * Config.
         *
         * @var array $config Configuration array.
         *
         * @since 1.0.0
         */
        private $config;

        /**
         * Tabs.
         *
         * @var array $tabs Tabs array.
         *
         * @since 1.0.0
         */
        private $tabs;

        /**
         * Theme name.
         *
         * @var string $theme_name Theme name.
         *
         * @since 1.0.0
         */
        private $theme_name;

        /**
         * Theme slug.
         *
         * @var string $theme_slug Theme slug.
         *
         * @since 1.0.0
         */
        private $theme_slug;

        /**
         * Current theme object.
         *
         * @var WP_Theme $theme Current theme.
         */
        private $theme;

        /**
         * Single instance.
         *
         * @var Galway_Lite_About $instance Instance object.
         */
        private static $instance;

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct()
        {
        }

        /**
         * Init.
         *
         * @param array $config Configuration array.
         * @since 1.0.0
         *
         */
        public static function init($config)
        {

            if (!isset(self::$instance) && !(self::$instance instanceof Galway_Lite_About)) {

                self::$instance = new Galway_Lite_About;

                if (!empty($config) && is_array($config)) {

                    self::$instance->config = $config;
                    self::$instance->configure();
                    self::$instance->hooks();

                }
            }

        }

        /**
         * Configure data.
         *
         * @since 1.0.0
         */
        public function configure()
        {

            $theme = wp_get_theme();

            if (is_child_theme()) {
                $this->theme_name = $theme->parent()->get('Name');
                $this->theme = $theme->parent();
            } else {
                $this->theme_name = $theme->get('Name');
                $this->theme = $theme->parent();
            }

            $this->theme_version = $theme->get('Version');
            $this->theme_slug = $theme->get_template();
            $this->menu_name = isset($this->config['menu_name']) ? $this->config['menu_name'] : esc_html__('About ', 'galway-lite'). esc_html( $this->theme_name );
            $this->page_name = isset($this->config['page_name']) ? $this->config['page_name'] : esc_html__('About ', 'galway-lite'). esc_html( $this->theme_name );
            $this->tabs = isset($this->config['tabs']) ? $this->config['tabs'] : array();
            $this->page_slug = $this->theme_slug . '-about';
        }

        /**
         * Setup hooks.
         *
         * @since 1.0.0
         */
        public function hooks()
        {

            // Register menu.
            add_action('admin_menu', array($this, 'register_info_page'));

            // Load assets.
            add_action('admin_enqueue_scripts', array($this, 'assets'));

        }

        /**
         * Register info page.
         *
         * @since 1.0.0
         */
        public function register_info_page()
        {

            // Add info page.
            add_theme_page($this->menu_name, $this->page_name, 'activate_plugins', $this->page_slug, array($this, 'render_page'));
        }

        /**
         * Render page.
         *
         * @since 1.0.0
         */
        public function render_page()
        {
            ?>
            <div class="wrap about-wrap theme-about-wrap">

                <?php $this->welcome_text(); ?>

                <?php $this->render_tabs(); ?>

                <?php $this->render_current_tab_content(); ?>

            </div><!-- .wrap .theme-about-wrap -->
            <?php
        }

        /**
         * Render quick links.
         *
         * @since 1.0.0
         */
        public function welcome_text()
        {
            ?>
            <div class="welcome-area-wrap">

                <h1><?php echo esc_html($this->theme_name); ?>
                    &nbsp;-&nbsp;<?php echo esc_html($this->theme_version); ?></h1>

                <p class="about-text">
                    <?php echo sprintf(esc_html__(' First off, We’d like to extend a warm welcome and thank you for choosing %1$s. %1$s is now installed and ready to use. We hope the following information will help you. If you want to ask any query or just want to say hello, you can always contact us. Again, Thank you for using our theme!', 'galway-lite'), 'Galway Lite'); ?>
                </p>

                <a href="<?php echo esc_url('https://themeinwp.com'); ?>" target="_blank">
                    <div class="wp-badge"></div>
                </a>

                <p class="quick-links">

                    <a href="<?php echo esc_url('https://themeinwp.com/theme/galway-lite/'); ?>" class="button "
                       target="_blank">
                        <?php esc_html_e('Theme Details', 'galway-lite'); ?>
                    </a>

                    <a href="<?php echo esc_url('https://demo.themeinwp.com/galway-lite/'); ?>" class="button "
                       target="_blank">
                        <?php esc_html_e('View Demo', 'galway-lite'); ?>
                    </a>

                    <a href="<?php echo esc_url('https://docs.themeinwp.com/docs/galway-lite/'); ?>"
                       class="button button-primary" target="_blank">
                        <?php esc_html_e('View Documentation', 'galway-lite'); ?>
                    </a>

                </p>

            </div>
            <?php
        }

        /**
         * Render tabs.
         *
         * @since 1.0.0
         */
        public function render_tabs()
        {

            $tabs = (isset($this->config['tabs']) && !empty($this->config['tabs'])) ? $this->config['tabs'] : array();

            if (empty($tabs)) {
                return;
            }

            $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash($_GET['tab'] ) ) : 'quick-setup';

            echo '<h2 class="nav-tab-wrapper wp-clearfix">';
            foreach ($tabs as $key => $tab) {

                $current_class = ' tab-' . $key;
                $current_class .= ($current_tab === $key) ? ' nav-tab-active' : '';
                echo '<a href="' . esc_url(admin_url('themes.php?page=' . $this->page_slug)) . '&tab=' . esc_attr($key) . '" class="nav-tab' . esc_attr($current_class) . '">' . esc_html($tab) . '</a>';
            }

            echo '</h2>';
        }

        /**
         * Render current tab content.
         *
         * @since 1.0.0
         */
        public function render_current_tab_content()
        {

            $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'quick-setup';
            $method = str_replace('-', '_', esc_attr($current_tab));

            if (method_exists($this, $method)) {
                $this->{$method}();
            } else {
                printf(esc_html__('%s() method does not exist.', 'galway-lite'), $method);
            }
        }

        /**
         * Render getting started.
         *
         * @since 1.0.0
         */
        public function quick_setup()
        {

            ?>
            <div class="feature-section twp-section twp-section-getting-started">
                <div class="theme-row">
                    <div class="theme-column column-one-full">
                        <div class="theme-panel">
                            <?php
                            if ( Galway_Lite_Dashboard_Notice::galway_lite_show_hide_notice($status = true) ) {

                                ?>
                                <div class="welcome-panel twp-galway-lite-notice">

                                    <h3><?php esc_html_e('Quick Setup','galway-lite'); ?></h3>

                                    <strong><p><?php esc_html_e('Install required plugins just by click button.','galway-lite'); ?></p></strong>

                                    <p>
                                        <a class="button button-primary twp-install-active" href="javascript:void(0)"><?php esc_html_e('Install and Active all required plugins.','galway-lite'); ?></a>
                                        <span class="quick-loader-wrapper"><span class="quick-loader"></span></span>
                                        <a class="btn-dismiss twp-custom-setup" href="javascript:void(0)"><?php esc_html_e('No Thanks, I prefer custom setup.','galway-lite'); ?></a>
                                    </p>

                                </div>
                                <?php

                            } else {
                                echo "Quick Setup is now complete. If you've any further questions or feedback? Go to the support section and we’ll gladly help.";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        public function getting_started()
        {
            ?>
            <div class="feature-section twp-section theme-getting-started">
                <div class="theme-row">

                    <div class="theme-column column-one-third">
                        <div class="theme-panel">
                            <h3>
                                <span class="dashicons dashicons-admin-customizer"></span>
                                <?php esc_html_e('Theme Options', 'galway-lite'); ?>
                            </h3>

                            <p><?php esc_html_e('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'galway-lite'); ?></p>

                            <a href="<?php echo esc_url(home_url('/') . 'wp-admin/themes.php/customize.php'); ?>"
                               class="button button-primary" target="_self">
                                <?php esc_html_e('Customize', 'galway-lite'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="theme-column column-one-third">
                        <div class="theme-panel">
                            <h3>
                                <span class="dashicons dashicons-admin-settings"></span>
                                <?php esc_html_e('Widget Ready', 'galway-lite'); ?>
                            </h3>

                            <p><?php esc_html_e('Galway Lite has predesigned custom widgets for sidebars.', 'galway-lite'); ?></p>

                            <a href="<?php echo esc_url(home_url('/') . 'wp-admin/themes.php/widgets.php'); ?>"
                               class="button button-primary" target="_self">
                                <?php esc_html_e('View Widgets', 'galway-lite'); ?>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /**
         * Render support.
         *
         * @since 1.0.0
         */
        public function support()
        {
            ?>
            <div class="feature-section twp-section theme-support-center">
                <div class="theme-row">
                    <div class="theme-column column-one-third">
                        <div class="theme-panel">
                            <h3>
                                <span class="dashicons dashicons-sos"></span>
                                <?php esc_html_e('Contact Support', 'galway-lite'); ?>
                            </h3>
                            <p><?php esc_html_e('Got theme support question or found bug or got some feedback? Best place to ask your query is the dedicated Support forum for the theme.', 'galway-lite'); ?></p>
                            <a href="<?php echo esc_url('https://wordpress.org/support/theme/galway-lite/'); ?>" class="button button-secondary" target="_blank">
                                <?php esc_html_e('Contact Support', 'galway-lite'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="theme-column column-one-third">
                        <div class="theme-panel">
                            <h3>
                                <span class="dashicons dashicons-format-aside"></span>
                                <?php esc_html_e('Theme Documentation', 'galway-lite'); ?>
                            </h3>
                            <p><?php esc_html_e('Please check our full documentation for detailed information on how to setup and customize the theme.', 'galway-lite'); ?></p>
                            <a href="<?php echo esc_url('https://docs.themeinwp.com/docs/galway-lite/'); ?>" class="button button-secondary" target="_blank">
                                <?php esc_html_e('View Documentation', 'galway-lite'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /**
         * Render useful plugins.
         *
         * @since 1.0.0
         */
        public function useful_plugins()
        {

            include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
            $plugins = Galway_Lite_Getting_started::galway_lite_required_plugins(); ?>

            <div class="feature-section twp-section theme-recommendation-center">

                <div class="theme-recommendation-plugin">
                    <div class="theme-row">
                        <?php foreach ($plugins as $key => $plugin) {

                            $plugin_info = plugins_api(
                                'plugin_information',
                                array(
                                    'slug' => sanitize_key(wp_unslash($key)),
                                    'fields' => array(
                                        'sections' => false,
                                    ),
                                )
                            );
                            $plugin_icon = Galway_Lite_Getting_started::galway_lite_plugin_icon($key);
                            $plugin_status = Galway_Lite_Getting_started::galway_lite_plugin_status($plugin['class'], $key, $plugin['PluginFile']);
                            ?>

                            <div id="<?php echo 'galway-lite-' . esc_attr($key); ?>" class="theme-column column-one-third galway-lite-about-col">
                                <div class="theme-panel">
                                    <div class="twp-req-img">
                                        <img src="<?php echo esc_url($plugin_icon); ?>" alt="<?php esc_attr_e('Plugin Image', 'galway-lite'); ?>">
                                    </div>

                                    <div class="required-plugin-details <?php if ($plugin_status['status'] == 'active') {
                                        echo 'required-plugin-active';
                                    } ?>">

                                        <?php if (isset($plugin_info->name)) { ?>
                                            <h3><?php echo esc_html($plugin_info->name); ?></h3>
                                        <?php } ?>

                                        <?php if (isset($plugin_status['status']) && isset($plugin_status['string'])) { ?>

                                            <a class="button twp-active-deactivate <?php echo 'twp-plugin-' . esc_attr($plugin_status['status']); ?>"
                                               plugin-status="<?php echo esc_attr($plugin_status['status']); ?>"
                                               plugin-file="<?php echo esc_attr($plugin['PluginFile']); ?>"
                                               plugin-folder="<?php echo esc_attr($key); ?>"
                                               plugin-slug="<?php echo esc_attr($key); ?>"
                                               plugin-class="<?php echo esc_attr($plugin['class']); ?>"
                                               href="javascript:void(0)"><?php echo esc_html($plugin_status['string']); ?></a>

                                        <?php } ?>

                                        <?php if ($plugin['setting_page']) { ?>
                                            <a href="<?php echo esc_url($plugin['setting_page']); ?>" class="button button-primary button-settings"><?php esc_html_e('Setting', 'galway-lite'); ?></a>
                                        <?php } ?>

                                        <?php if( isset( $plugin_info->author ) ) {
                                            echo $this->galway_lite_escape_anchor( $plugin_info->author );
                                        } ?>

                                        <?php if( isset( $plugin_info->version ) ){ ?>
                                            
                                            <span>
                                                <?php
                                                esc_html_e('Version ', 'galway-lite');
                                                echo esc_html($plugin_info->version);
                                                ?>
                                            </span>

                                        <?php } ?>

                                        <div class="twp-installation-message"></div>

                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>
                </div>






            </div>

            <?php
        }

        /**
         * Load assets.
         *
         * @param string $hook Hook,
         * @since 1.0.0
         *
         */
        public function assets($hook)
        {

            $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

            if (in_array($hook, array('themes.php', 'appearance_page_' . $this->page_slug), true)) {
                wp_enqueue_style('galway-lite-about', get_template_directory_uri() . '/assets/twp/css/about' . $min . '.css', array(), '1.0.0');
            }

        }

        public function galway_lite_escape_anchor($input)
        {

            $all_tags = array(
                'a' => array(
                    'href' => array()
                )
            );
            return wp_kses($input, $all_tags);

        }

        public function galway_lite_required_plugins()
        {

            return array(

                'booster-extension' => array(
                    'PluginFile' => 'booster-extension.php',
                    'class' => 'Booster_Extension_Class',
                ),
                'one-click-demo-import' => array(
                    'PluginFile' => 'one-click-demo-import.php',
                    'class' => 'OCDI_Plugin',
                ),

            );

        }

    }
}

if (!function_exists('galway_lite_about_setup')) :

    /**
     * About setup.
     *
     * @since 1.0.0
     */
    function galway_lite_about_setup()
    {

        $config = array(

            // Tabs.
            'tabs' => array(
                'quick-setup' => esc_html__('Quick Setup', 'galway-lite'),
                'getting-started' => esc_html__('Getting Started', 'galway-lite'),
                'support' => esc_html__('Support', 'galway-lite'),
                'useful-plugins' => esc_html__('Recommended Plugins', 'galway-lite'),
            ),

        );

        Galway_Lite_About::init($config);
    }

endif;

add_action('after_setup_theme', 'galway_lite_about_setup');