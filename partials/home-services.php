<?php                    
    query_posts( array('post_type' => 'services', 'posts_per_page' => 2, 'orderby' => 'menu_order') );
?>
    <?php if( have_posts()) : $postNumber = 0;?>
        <div class="home-services py-5 position-relative">
            <div class="container">
                <div class="row pt-3 pb-4">
                    <h2 class="h1 text-center fw-bold">Services</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php while ( have_posts() ) : the_post(); $postNumber++; ?>
                            <?php 
                                $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                $email = get_field('email', $post->ID);
                                $phone = get_field('phone');    
                            ?>
                            <div class="row <?php echo $postNumber <= 1 ? 'mb-5' : '';?>">
                                <div class="col-12 col-md-6 p-md-0 <?php echo $postNumber > 1 ? 'order-md-last' : '';?>">
                                    <div class="home-services-content py-5 bg-gray h-100 d-flex">
                                        <div class="align-self-center">
                                            <h3 class="h3 home-services-content-heading mb-3 text-black"><?php the_title(); ?></h3>
                                            <div class="home-services-content-info">
                                                <p><?php echo get_the_excerpt(); ?></p>
                                                <p class="text-primary">
                                                    <a href="mailto:sales@stwards.com">sales@stwards.com</a>
                                                    <span>|</span>
                                                    <a href="tel:5073140714">Oficina 1: (+507) 314-0714</a>
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
                    <a href="#" class="button-primary">View more services</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php wp_reset_query(); ?>

