<section
        class="h-100 w-100 position-relative row align-items-center px-0 mx-0 justify-content-center justify-content-lg-end section2 bg-secondary pb-5 pb-lg-0"
        data-name="<?= get_field('section_name_2'); ?>">

    <div class="col-lg-10 col-12 row justify-content-center justify-content-lg-start px-0 align-items-center pt-lg-5">
        <div class="col-lg-6 pt-lg-5 pt-4">
            <h1 class="text-primary display-1 fw-bolder" data-aos="fade-down" data-aos-delay="100">
                <?= get_field('portfolio_title'); ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="navPortfolio nav nav-fill overflow-x-scroll flex-lg-wrap flex-nowrap gap-2 border-bottom border-white justify-content-start mb-4"
                    data-aos="fade-left" data-aos-delay="500"
                    id="myTab" role="tablist">
                    <?php
                    $featured_posts = get_field('select_portfolio');
                    $terms = array();

                    if ($featured_posts) :
                        foreach ($featured_posts as $post) :
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post);
                            // Get the custom taxonomy terms for the post
                            $custom_taxonomy_terms = wp_get_post_terms(get_the_ID(), 'portfolio_categories');
                            // Check if there are custom taxonomy terms
                            if ($custom_taxonomy_terms) {
                                $term_list = array();
                                foreach ($custom_taxonomy_terms as $term) {
                                    $terms[$term->term_id] = $term;
                                }

                            }

                        endforeach;
                        $i = 0;
                        // Iterate through the unique set of terms to generate the tab buttons
                        foreach ($terms as $term) {
                            $i++;
                            $category_id = $term->term_id; ?>
                            <li class="linkPortfolio nav-item" role="presentation">
                                <button class="px-3 py-2 text-uppercase custom-nav-button fs-6 <?php if ($i == 1) {
                                    echo 'active';
                                } ?>"
                                        id="cat-<?= $category_id; ?>-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#cat-<?= $category_id; ?>" type="button" role="tab"
                                        aria-controls="cat-<?= $category_id; ?>" aria-selected="true">
                                    <?= $term->name; ?>
                                </button>
                            </li>
                        <?php }
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
                <div class="tab-content row justify-content-center min-vh-75 align-items-start" id="myTabContent">

                    <?php
                    $s = 0;
                    foreach ($terms as $term) {
                        $s++;
                        $category_id = $term->term_id; ?>
                        <div class="tab-pane fade <?php if ($s == 1) {
                            echo 'show active';
                        } ?>"
                             id="cat-<?= $category_id; ?>"
                             role="tabpanel"
                             aria-labelledby="cat-<?= $category_id; ?>-tab">
                            <?php
                            $args = array(
                                'post_type' => 'portfolio',
                                'ignore_sticky_posts' => 1,
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'portfolio_categories',
                                        'field' => 'term_id',
                                        'terms' => $category_id,
                                        'operator' => 'IN'
                                    )
                                )
                            );
                            $loopPortfolio = new WP_Query($args);
                            $index = 0;
                            if ($loopPortfolio->have_posts()) { ?>
                                <div class="swiper swiperPortfolio">
                                    <div class="swiper-wrapper">
                                        <?php while ($loopPortfolio->have_posts()) : $loopPortfolio->the_post();
                                            $index++;
                                            $category_ids = get_the_terms(get_the_ID(), 'portfolio_categories');
                                            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                            <div class="swiper-slide aos" data-aos="fade-up"
                                                 data-aos-delay="<?= $index; ?>00">
                                                <div class="card bg-transparent rounded-0 mb-3 border-0" style="max-width: 700px;">
                                                    <div class="row g-2">
                                                        <div class="col-md-8 col-12">
                                                            <?php if ($featured_image_url) { ?>
                                                                <img class="img-fluid"
                                                                     src="<?php echo $featured_image_url; ?>"
                                                                     alt="<?php the_title(); ?>">
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="d-flex flex-column justify-content-end align-items-center h-100">
                                                                <h5 class="card-title text-white fs-6">Info : <?= get_the_title(); ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>

                                    </div>
                                    <!-- Navigation buttons -->
                                    <div class="swiper-button-next text-white"></div>
                                    <div class="swiper-button-prev text-white"></div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>

</section>

