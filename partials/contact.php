<?php 
    $query_history = new WP_Query( array( 'pagename' => 'contacto' ) ); 
?>
<?php if ($query_history->have_posts()): ?>
<?php while ($query_history->have_posts()): $query_history->the_post(); ?>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <?php  the_title(); ?>
                   <?php  the_excerpt(); ?>
                   <span> <?php the_field('title_questions') ?> </span><br>
                   <span> <?php the_field('content_title_questions') ?> </span><br>
                   <span> <?php the_field('title_need_support') ?> </span><br>
                   <span> <?php the_field('email_support') ?> </span><br>
                   <span> <?php the_field('title_we_are_open_on') ?> </span><br>
                   <span> <?php the_field('content_we_are_open_on') ?> </span>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>   