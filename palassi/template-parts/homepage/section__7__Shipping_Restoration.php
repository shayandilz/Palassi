<section
        class="h-100 w-100 position-relative row align-items-center px-0 mx-0 justify-content-end section2 aos-remover bg-secondary pb-5 pb-lg-0"
        data-name="<?= get_field('section_name_7'); ?>">

    <div class="col-lg-10 col-12 row justify-content-start align-items-center">
        <div class="col-12 px-0 pb-3 pb-lg-0">
            <h1 class="text-primary display-4 fw-bolder text-uppercase" data-aos="fade-down" data-aos-delay="100">
                <?= get_field('service_title'); ?>
            </h1>
        </div>
        <div class="row px-0">
            <div class="col-lg-12 d-flex flex-lg-row flex-column justify-content-start align-items-center gap-2 gap-lg-0" data-aos="fade-down" data-aos-delay="300">
                <?php

                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                );
                $loopService = new WP_Query($args);
                $totalPosts = $loopService->found_posts;
                if ($loopService->have_posts()) {
                    while ($loopService->have_posts()) : $loopService->the_post();
                        $postWidth = (100 / $totalPosts);
                        $service_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <?php if ($service_image_url) { ?>
                            <a href="<?php the_permalink(); ?>" style="width: <?php echo $postWidth . '%'; ?>;" onmouseover="this.style.width='<?php echo $postWidth + 10 . '%'; ?>';" onmouseout="this.style.width='<?php echo $postWidth . '%'; ?>';" class="service_image overflow-hidden position-relative">
                                <img class="w-100 h-100 object-fit" src="<?php echo $service_image_url; ?>"
                                     alt="<?php the_title(); ?>">
                                <h3 class="position-absolute end-0 start-0 text-center text-white fs-3">
                                    <?php the_title() ?>
                                </h3>
                            </a>
                        <?php }
                    endwhile;
                    wp_reset_postdata();
                } ?>
            </div>

        </div>
    </div>

</section>

