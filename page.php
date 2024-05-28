<?php get_header(); ?>
<main id="content" role="main">
    <?php
if (have_posts()) : while (have_posts()) : the_post();
    $imagenHeading = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>
    
    <div class="internal-heading position-relative" style="background-image: url(<?php echo $imagenHeading; ?>);">
        <div class="internal-heading-layer"></div>
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-12 col-lg-10 position-relative">
                    <h1 class="h1 text-center text-white"><?php the_title(); ?></h1> 
                </div>
            </div>
        </div>
    </div>

    <article id="post-<?php the_ID(); ?>" <?php post_class('py-5 internal-content position-relative'); ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="wp_editor">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
</main>
<?php get_footer(); ?>