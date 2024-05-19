<?php                    
    query_posts( array('post_type' => 'bannerhome', 'posts_per_page' => 1, 'orderby' => 'menu_order') ); 
?>
    <?php if(have_posts()) : ?>
        <div class="banner">
            <?php 
                while ( have_posts() ) : the_post();   
                    $featureImage = get_the_post_thumbnail_url(get_the_ID(),'full');
                    if($featureImage) {
                        $imageUrl = $featureImage;
                    } else {
                        $imageUrl = get_template_directory_uri() .'/images/banner-default.jpg';
                    }
            ?>
                <div class="banner-bg h-100 position-relative" style="background-image: url(<?php echo $imageUrl; ?>);">
                <video class="banner-video-background" muted="" autoplay="" loop="">
                    <source src="https://duodesarrollo.com/stward/wp-content/uploads/2024/05/stward_corporation_1.mp4" type="video/mp4">
                </video>
                <div class="banner-layer"></div>
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center">
                            <div class="col-12 col-lg-6 text-center position-relative">
                                <span class="banner-text text-white bg-primary py-2 px-3"><?php the_field('Subtitle_Banner') ?></span>
                                <h2 class="text-white mt-4 mb-3 hero"><?php the_title(); ?></h2>
                                <p class="banner-text text-white px-5"><?php echo get_the_content(); ?></p>
                                <span class="video"><?php the_field('video_banner') ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php wp_reset_query(); ?>  
