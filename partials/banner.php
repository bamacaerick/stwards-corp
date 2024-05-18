<?php                    
    query_posts( array("post_type" => "bannerhome") );
    while ( have_posts() ) : the_post();   
?>
    <span> <?php the_field('Subtitle_Banner') ?></span>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <span class="video"><?php the_field('video_banner') ?> </span>
    <img src="<?php //echo $foto; ?>" alt="">
    
<?php 
    endwhile; wp_reset_query();
?>  
