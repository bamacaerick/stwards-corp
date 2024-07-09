<?php                    
    $homeServices = new WP_Query(array('post_type' => 'services', 'posts_per_page' => 2, 'orderby' => 'menu_order', 'order' => 'ASC') );
?>
    <?php if( $homeServices->have_posts()) : $postNumber = 0;?>
        <div class="home-services py-5 position-relative">
            <div class="container">
                <div class="row pt-3 pb-4">
                    <h2 class="h1 text-center">Services</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php while ( $homeServices->have_posts() ) : $homeServices->the_post(); $postNumber++; ?>
                            <?php 
                                $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                $email = get_field('email_field_value');
                                $phone = get_field('phone_field_value');
                                $introText = get_field('introductory_text');

                                if(is_null($email) || empty($email)){
                                    $email =  'sales@stwards.com'; 
                                }

                                if(is_null($phone) || empty($phone)){
                                    $phone = 'Oficina 1: (+507) 314-0714';
                                }

                                if(is_null($introText) || empty($introText)){ 
                                    $introText = get_the_excerpt(); 
                                }
                            ?>
                            <div class="row <?php echo $postNumber <= 1 ? 'mb-5' : '';?>">
                                <div class="col-12 col-md-6 p-md-0 <?php echo $postNumber > 1 ? 'order-md-last' : '';?>">
                                    <div class="home-services-content py-5 bg-gray h-100 d-flex">
                                        <div class="align-self-center">
                                            <h3 class="h3 home-services-content-heading mb-3 text-black"><?php the_title(); ?></h3>
                                            <div class="home-services-content-info">
                                                <p class="lato-regular"><?php echo $introText; ?></p>
                                                <p class="text-primary">
                                                    <a class="home-services-content-link" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                                    <span>|</span>
                                                    <span><?php echo $phone; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 p-md-0">
                                    <img class="img-responsive" src="<?php echo $featuredImage; ?>" alt="" height="354" width="100%">
                                </div>
                            </div>
                        <?php endwhile; ?>  
                    </div>
                </div>
            </div>  
        </div>
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="<?php echo home_url(); ?>/services" class="button button-primary">View more services</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php wp_reset_query(); ?>

