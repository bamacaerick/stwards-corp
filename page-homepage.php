<?php 
    /**
     * Template name: homepage
     */

    get_header(); 
?>
<main id="content" role="main">
    <?php get_template_part('partials/banner'); ?>
    <?php get_template_part('partials/services'); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       
    <div class="experience">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_title(); ?> 
                    <?php the_content(); ?> 
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>

    <?php get_template_part('partials/contact'); ?>
    <?php get_template_part('partials/news'); ?>

</main>
<?php get_footer(); ?>