<?php get_header(); ?>
<main id="content" role="main">
    <?php
if (have_posts()) : while (have_posts()) : the_post();

    $image_url = get_field('header_image');
    if($image_url) {
        $image_id = attachment_url_to_postid($image_url);
        $size = 'header_internal'; // replace with your custom size
        $image = wp_get_attachment_image_src($image_id, $size);
        $customImageUrl = $image[0];
    }
    else {
        $customImageUrl = get_bloginfo('template_url') . '/images/defeault-header-news-images.jpg';
    }

    ?>
    
    <div class="internal-heading position-relative" style="background-image: url(<?php echo $customImageUrl; ?>);">
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