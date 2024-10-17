<?php get_header(); ?>
<section class="page">
    <div class="container">
        <div class="woocommerce-breadcrumb">
            <?php echo bcn_display(); ?>
        </div>
        <h1 class="title-l mb-3"><?php the_title(); ?></h1>
        <div class="section simple-page">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>