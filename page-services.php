<?php 
    /**
     * Template name: services
     */

    get_header(); 
?>
<main id="content" role="main">

   
    <?php 
        if (have_posts()) : while (have_posts()) : the_post(); 
        $imagenHeading = get_the_post_thumbnail_url(get_the_ID(),'full');  
    ?>
    
    <div class="experience">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_title(); ?> 
                    <?php the_content(); ?> 
                    <img src="<?php //echo $imagenHeading ?> " alt="">
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
    <?php get_template_part('partials/services'); ?>
</main>
<?php get_footer(); ?>