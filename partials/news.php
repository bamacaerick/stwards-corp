<?php                    
    query_posts( array("post_type" => "post") );
    while ( have_posts() ) : the_post();   
    $picture_post = get_the_post_thumbnail_url(get_the_ID(),'full');  
?>
    
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <img src="<?php echo $picture_post ; ?>" alt="">
    <a href="<?php the_permalink(); ?>">click here</a>
    
<?php 
    endwhile; wp_reset_query();
?>  
