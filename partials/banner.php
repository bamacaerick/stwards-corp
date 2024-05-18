<?php                    
    query_posts( array("post_type" => "bannerhome") );
    while ( have_posts() ) : the_post();   
    $foto = get_the_post_thumbnail_url(get_the_ID(),'full');  
?>
    <span> <?php the_field('Subtitle_Banner') ?></span>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <img src="<?php //echo $foto; ?>" alt="">
    
<?php 
    endwhile; wp_reset_query();
?>  
