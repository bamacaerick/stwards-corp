<?php

$args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'post_status' => 'publish',
);

$getAllServices = new WP_Query($args);
?>

<div class="services py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="h1 text-center">Our services</h2>
            </div>
        </div>
        <div class="row pt-lg-5">
            <div class="col-12">
                <div class="tab-services justify-content-center text-center">
                    <a data-tab="" href="<?php echo home_url(); ?>/services" class="active menu-services-all button button-primary-reverse <?php echo empty($term) ? 'active' : ''; ?>">Services</a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'services-menu',
                        'container' => false,
                        'menu_class' => 'menu-services',
                        'menu_id' => 'menu-services',
                        'fallback_cb' => false,
                    )); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="services-content py-lg-5">
        <div class="container">
            <div class="row">
                <?php if($getAllServices->have_posts()): ?>
                    <div class="col-12 mb-5">
                        <div class="swiper swiper-services pb-5 px-3">
                            <div class="swiper-wrapper">
                                <?php while ($getAllServices->have_posts()): $getAllServices->the_post(); ?>
                                    <?php 
                                        $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full');  
                                        $email = get_field('email_field_value');
                                        $phone = get_field('phone_field_value');
                                        $introText = get_field('introductory_text');
                                        $show_read_more = get_field('show_read_more');

                                        if(is_null($email) || empty($email)) {
                                            $email =  'sales@stwards.com';
                                        }

                                        if(is_null($phone) || empty($phone)) {
                                            $phone = 'Oficina 1: (+507) 314-0714';
                                        }


                                        if(is_null($introText) || empty($introText)) {
                                            $introText = get_the_excerpt();
                                        }
                                    ?>
                                    <div class="mt-4 swiper-slide h-auto">
                                        <div class="card h-100">
                                            <div class="card-thumb">
                                                <img class="img-responsive" src="<?php echo $featuredImage; ?>" alt="">
                                            </div>
                                            <div class="card-heading">
                                                <h3 class="h6 mt-3 mb-2"><?php the_title(); ?></h3>
                                            </div>
                                            <div class="card-description">
                                                <p class="lato-regular">
                                                    <?php echo $introText; ?>
                                                    <?php if($show_read_more) : ?>
                                                        <a class="text-black fw-bold" href="<?php the_permalink(); ?>">Read more</a> <br>
                                                    <?php endif; ?>
                                                </p>
                                                
                                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
                                                <span><?php echo $phone; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>