<?php                    
    query_posts( array('post_type' => 'services', 'posts_per_page' => 2) );
?>
    <?php if( have_posts()) : ?>
        <div class="home-services py-5">
            <div class="container">
                <div class="row">
                    <h2 class="h2 text-center">Services</h2>
                </div>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="row">
                        <?php $featuredImage = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                        <?php the_title(); ?>
                        <p><?php the_excerpt(); ?></p>
                        <span> <?php the_field('email') ?></span>
                        <span> <?php the_field('phone') ?></span>
                    </div>
                <?php endwhile; ?>  
            </div>  
        </div>

<?php endif; ?>
<?php wp_reset_query(); ?>

