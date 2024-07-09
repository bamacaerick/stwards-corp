<footer id="footer" role="contentinfo" class="footer">
    <div class="container py-5" id="copyright">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="footer-branding">
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
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-contact">
                    <p>
                        <span class="footer-contact-phone fw-bold d-block mb-2">Contact us 24 hours</span>
                        <span>Office 1: (+507) 314-0714</span>
                    </p>
                    <p>
                        <span class="footer-contact-launch fw-bold d-block mb-2">Launch Service</span>
                        <a class="footer-link" href="mailto:ngalindo@stwards.com">ngalindo@stwards.com</a><br>
                        <span>(+507) 6922-8340</span>
                    </p>
                    <p>
                        <span class="footer-contact-bunkering fw-bold d-block mb-2">Bunkering</span>
                        <a class="footer-link" href="mailto:ppadilla@stwards.com">ppadilla@stwards.com</a><br>
                        <a class="footer-link" href="mailto:sales@stwards.com">sales@stwards.com</a><br>
                        <span>(+507) 6679-1225</span>
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <p class="footer-social fw-bold">Social Media</p>
                <a class="footer-social-icon footer-social-icon-ig me-2" href="https://www.instagram.com/stwardcorp/" target="_blank"><span>Follow us on Instagram</span></a>
                <a class="footer-social-icon footer-social-icon-lin" href="https://www.linkedin.com/in/stwards-marine-services-b4b442b5/" target="_blank"><span>Follow us on LinkedIn</span></a>
                <p class="footer-social fw-bold mt-4 mb-0">Work with us</p>
                <a class="footer-link" href="<?php echo home_url(); ?>/work-with-us/">Be a seaman like us</a>
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