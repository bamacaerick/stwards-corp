<footer id="footer" role="contentinfo" class="footer">
    <div class="container py-5" id="copyright">
        <div class="row">
            <div class="col-12 col-md-4">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    $nologo = '';
                } elseif (has_site_icon()) {
                    $logo = get_site_icon_url();
                    $nologo = '';
                } else {
                    $logo = '';
                    $nologo = 'no-logo';
                }
                echo '<img src="';
                if (has_custom_logo()) {
                    echo esc_url($logo[0]);
                } else {
                    echo esc_url($logo);
                }
                echo '" width="180" height="59" alt="' . esc_attr(get_bloginfo('name')) . '" id="logo" class="' . esc_attr($nologo) . '" itemprop="url" />';
                ?>
                <div class="pe-5 me-5">
                    <p class="mb-0 mt-2 pe-5"><?php bloginfo('description'); ?></p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                contact
            </div>
            <div class="col-12 col-md-4">
                social
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary py-3">
        <div class="row">
            <div class="col-12">
                <p class="p-0 m-0 text-center footer-address">
                    Bella Vista, Hi Point building, 24ht Floor, Panama.  Copyright © <?php echo esc_html(date_i18n(__('Y', 'generic'))); ?> Stward Corporation
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>