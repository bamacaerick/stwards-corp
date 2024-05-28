<?php
query_posts(array("post_type" => "post", 'posts_per_page' => -1));
?>

<?php if(have_posts()) : ?>
    <div class="news-home py-5">
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>   
                    <div class="col-12 col-md-3 mt-5">
                        <div class="news-home-card h-100">
                            <div class="news-home-card-thubm">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('news_listing', array('class' => 'img-responsive')); ?>
                                <?php endif; ?>
                            </div>
                            <div class="news-home-card-body p-3">
                                <a class="news-home-card-heading fw-bold text-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p class="news-home-card-description lato-regular"><?php echo get_the_excerpt(); ?></p>
                                <a class="text-black news-home-card-permalink fw-bold" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query(); ?>