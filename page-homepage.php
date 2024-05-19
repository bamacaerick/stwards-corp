<?php 
    /**
     * Template name: homepage
     */

    get_header(); 
?>
<main id="content" role="main">
    <?php get_template_part('partials/banner'); ?>
    <?php get_template_part('partials/home-services'); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <?php $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
        <div class="experience py-5 mt-5" style="background-image: url(<?php echo $featuredImage; ?>);">
            <div class="container">
                <div class="row py-5 justify-content-center justify-content-lg-start">
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <h2 class="h1 text-white fw-bold mb-3"><?php the_title(); ?></h2> 
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="experience-description pt-1">
                                    <p class="text-white m-0">
                                        <?php echo get_the_content(); ?> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>

    <?php get_template_part('partials/contact'); ?>
    <?php get_template_part('partials/home-news'); ?>

</main>
<?php get_footer(); ?>