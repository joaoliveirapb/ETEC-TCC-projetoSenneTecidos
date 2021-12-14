<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galway Lite
 */
?>
<?php if (is_active_sidebar('slide-menu')):?>
    <div id="sidr-nav">
        <div class="sidr-close-holder mb-10 mt-30">
            <a href="javascript:void(0)" class="skpi-link-offcanvas-start"></a>
            <a class="sidr-class-sidr-button-close" href="#sidr-nav"><?php echo esc_html__('Close', 'galway-lite');?><i class="ion-ios-close-empty"></i></a>
        </div>
        <!-- offcanvas navigation content -->
        <?php dynamic_sidebar('slide-menu'); ?>
        <a href="javascript:void(0)" class="skpi-link-offcanvas-end-1"></a>
        <a href="javascript:void(0)" class="skpi-link-offcanvas-end"></a>
    </div>
<?php endif;?>
</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <?php $galway_lite_footer_widgets_number = galway_lite_get_option('number_of_footer_widget');
    if ($galway_lite_footer_widgets_number != 0) {?>
        <?php
        if (1 == $galway_lite_footer_widgets_number) {
            $col = 'col-md-12';
        } elseif (2 == $galway_lite_footer_widgets_number) {
            $col = 'col-md-6';
        } elseif (3 == $galway_lite_footer_widgets_number) {
            $col = 'col-md-4';
        } elseif (4 == $galway_lite_footer_widgets_number) {
            $col = 'col-md-3';
        } else {
            $col = 'col-md-3';
        }
        if (is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three') || is_active_sidebar('footer-col-four')) {?>
        <div class="footer-widget pt-60 pb-40">
            <div class="container">
                <div class="row">
                    <?php if (is_active_sidebar('footer-col-one') && $galway_lite_footer_widgets_number > 0):?>
                        <div class="contact-list <?php echo $col;?>">
                            <?php dynamic_sidebar('footer-col-one');?>
                        </div>
                    <?php endif;?>
                    <?php if (is_active_sidebar('footer-col-two') && $galway_lite_footer_widgets_number > 1):?>
                        <div class="contact-list <?php echo $col;?>">
                            <?php dynamic_sidebar('footer-col-two');?>
                        </div>
                    <?php endif;?>
                    <?php if (is_active_sidebar('footer-col-three') && $galway_lite_footer_widgets_number > 2):?>
                        <div class="contact-list <?php echo $col;?>">
                            <?php dynamic_sidebar('footer-col-three');?>
                        </div>
                    <?php endif;?>
                    <?php if (is_active_sidebar('footer-col-four') && $galway_lite_footer_widgets_number > 3):?>
                        <div class="contact-list <?php echo $col;?>">
                            <?php dynamic_sidebar('footer-col-four');?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php }?>
    <?php }?>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <h4 class="site-copyright secondary-textcolor secondary-font">
                            <p>
								© 2021 Senne Tecidos. Todos os direitos reservados.
							</p>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

    <?php
    $enable_scroll_top_button = galway_lite_get_option('enable_scroll_top_button');
    if( $enable_scroll_top_button ){ ?>

        <div class="scroll-up alt-bgcolor">
            <i class="ion-ios-arrow-up text-light"></i>
        </div>

    <?php } ?>

<?php wp_footer();?>
</body>
</html>