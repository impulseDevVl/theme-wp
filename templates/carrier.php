<?php
/*
Template Name: Карьера
Template Post Type: page
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="woocommerce-breadcrumb">
        <?php echo bcn_display(); ?>
    </div>
</div>
<div class="h1TitleWrapper">
    <div class="h1TitleInner">
        <h1><?php the_content(); ?></h1>
    </div>
</div>
<div class="carrierListWrapper">
    <div class="carrierListInner">
        <?php $args = array(
            'post_type' => 'job-vacancy',
            'posts_per_page' => -1,
        );

        $vacancy = new WP_Query($args);
        echo get_loop_vacancy($vacancy, false);
        wp_reset_postdata();  ?>
    </div>
</div>
<?php get_footer(); ?>