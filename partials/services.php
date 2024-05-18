services query<?php                    
    query_posts( array("post_type" => "services") );
    while ( have_posts() ) : the_post();   
    $foto_servicio = get_the_post_thumbnail_url(get_the_ID(),'full');  
?>
   
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <img src="<?php echo $foto_servicio; ?>" alt="">
    <span> <?php the_field('correo_electronico') ?></span>
    <span> <?php the_field('telefono') ?></span>
<?php 
    endwhile; wp_reset_query();
?>  
