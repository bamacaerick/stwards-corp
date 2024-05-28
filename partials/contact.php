<?php 
    $query_history = new WP_Query( array( 'pagename' => 'contacto' ) ); 
?>
<?php if ($query_history->have_posts()): ?>
<?php while ($query_history->have_posts()): $query_history->the_post(); ?>
    <div class="contact-home py-5 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                           <h2 class="h1 mb-3"><?php the_title(); ?></h2>
                           <div class="lato-regular"><?php the_field('home_text'); ?></div>
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <div class="contact-home-box text-start mb-4 align-self-end">
                                <div class="contact-home-box-icon phone">
                                    <span class="fw-bold"> <?php the_field('title_questions') ?> </span><br>
                                    <span class="lato-regular"> <?php the_field('content_title_questions') ?> </span><br>
                                </div>
                            </div>
                            <div class="contact-home-box text-start mb-4 align-self-end">
                                <div class="contact-home-box-icon mail">
                                    <span class="fw-bold"> <?php the_field('title_need_support') ?> </span><br>
                                    <a class="contact-home-box-link lato-regular" href="mailto:<?php the_field('email_support') ?>"> <?php the_field('email_support') ?> </a><br>
                                </div>
                            </div>
                            <div class="contact-home-box text-start mb-4 align-self-end">
                                <div class="contact-home-box-icon clock">
                                    <span class="fw-bold"> <?php the_field('title_we_are_open_on') ?> </span><br>
                                    <span class="lato-regular"> <?php the_field('content_we_are_open_on') ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>   