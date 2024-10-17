<?php
/*
Template Name: Контакты
Template Post Type: page
*/
?>
<?php get_header(); ?>
<div class="page section">
    <div class="container">
        <div class="woocommerce-breadcrumb">
            <?php echo bcn_display(); ?>
        </div>
        <h1 class="title-l mb-3"><?php the_title(); ?></h1>
        <div class="page__content section mb-3">
            <?php the_content(); ?>
        </div>
        <div class="map"><?php the_field('map_iframe'); ?></div>
    </div>
</div>
<?php get_footer(); ?>