<?php                    
    query_posts( array("post_type" => "post", 'posts_per_page' => 3) );
    ?>

<?php if(have_posts()) : ?>
    <div class="news-home py-5">
        <div class="container">
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>   
                    <?php $featureImage = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>  
                    <div class="col-12 col-md-4 mt-5 mt-md-0">
                        <div class="news-home-card">
                            <div class="news-home-card-thubm">
                                <img class="img-responsive" src="<?php echo $featureImage; ?>" alt="">
                            </div>
                            <div class="news-home-card-body p-3">
                                <a class="news-home-card-heading fw-bold text-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p class="news-home-card-description"><?php echo get_the_excerpt(); ?></p>
                                <a class="text-black news-home-card-permalink fw-bold" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <a href="#" class="button-primary">View more services</a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query(); ?>