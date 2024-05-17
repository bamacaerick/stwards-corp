<?php 
    /**
     * Template name: homepage
     */

    get_header(); 
?>
<main id="content" role="main">
    <?php get_template_part('partials/banner'); ?>
    <?php get_template_part('partials/services'); ?>

    <div class="experience">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    From homepage content 
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    From contact page (Run a query to get the contact page and the custom fields)
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/news'); ?>

</main>
<?php get_footer(); ?>