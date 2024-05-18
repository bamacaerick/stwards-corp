<?php
$custom_taxonomy_terms = get_terms(array(
    'taxonomy' => 'categoria',
    'hide_empty' => false,
));

if ($custom_taxonomy_terms && !is_wp_error($custom_taxonomy_terms)) {
    foreach ($custom_taxonomy_terms as $term) {
        echo '<h2>' . esc_html($term->name) . '</h2>';

        $args = array(
            'post_type' => 'services',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categoria',
                    'field' => 'term_id',
                    'terms' => $term->term_id,
                ),
            ),
            'posts_per_page' => -1, 
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<ul>';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                //the_content();
                //$image_full = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                //echo '<img src="'.$image_full.'">';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay posts en esta categoría.</p>';
        }

        wp_reset_postdata();
    }
}
?>