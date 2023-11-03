<?php get_header();
while (have_posts()) :
    the_post();
    ?>

    <section class="min-vh-100">

    </section>
<?php endwhile;
wp_reset_query();
get_footer(); ?>
