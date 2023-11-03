<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pandplus
 */
if (have_posts()) {
    the_post();
    get_header(); ?>

    <!-- Slider main container -->
    <div class="swiper swiper1">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" data-hash="video">
                <?php
                //    <!--Hero -->
                get_template_part('template-parts/homepage/section__1__Hero');
                ?>
            </div>
            <div class="swiper-slide" data-hash="Collections">
                <?php
                //    <!--Collections -->
                get_template_part('template-parts/homepage/section__2__Collections');
                ?>
            </div>
            <div class="swiper-slide bg-body" data-hash="Antique">
                <?php
                //    <!--Antique -->
                get_template_part('template-parts/homepage/section__3__Antique');
                ?>
            </div>
            <div class="swiper-slide bg-body" data-hash="Story">
                <?php
                //    <!--Story -->
                get_template_part('template-parts/homepage/section__4__Story');
                ?>
            </div>
<!--            <div class="swiper-slide bg-body" data-hash="Showrooms">-->
<!--                --><?php
//                //    <!--Showrooms -->
//                get_template_part('template-parts/homepage/section__5__Showrooms');
//                ?>
<!--            </div>-->
<!--            <div class="swiper-slide bg-body" data-hash="Expertise">-->
<!--                --><?php
//                //    <!--Expertise -->
//                get_template_part('template-parts/homepage/section__6__Expertise');
//                ?>
<!--            </div>-->
            <div class="swiper-slide bg-body" data-hash="Shipping">
                <?php
                //    <!--Shipping -->
                get_template_part('template-parts/homepage/section__7__Shipping_Restoration');
                ?>
            </div>
            <div class="swiper-slide bg-body" data-hash="Contact">
                <?php
                //    <!--Contact -->
                get_template_part('template-parts/homepage/section__8__Contact');
                ?>
            </div>
            <div class="swiper-slide bg-body" data-hash="Booking">
                <?php
                //    <!--Booking -->
                get_template_part('template-parts/homepage/section__9__Booking');
                ?>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination swiper-pagination-custom-home w-auto"></div>
    </div>

    <?php
}
get_footer();