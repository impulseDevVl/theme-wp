<?php
/*
Template Name: Текстовая страница
Template Post Type: post, page
*/
?>

<?php get_header(); ?>
<section class="page simple-page1 section">
    <div class="container">
        <div class="woocommerce-breadcrumb">
            <?php echo bcn_display(); ?>
        </div>
        <h1 class="title mb-3"><?php the_title() ?></h1>
        <div class="content"><?php the_content(); ?></div>
    </div>
</section>
<?php get_footer(); ?>