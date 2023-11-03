<section
        class="h-100 w-100 position-relative row align-items-center px-0 mx-0 justify-content-end section2 aos-remover bg-secondary"
        data-name="<?= get_field('section_name_2'); ?>">

    <div class="col-lg-10 row justify-content-start align-items-center">
        <div class="col-lg-6">
            <h1 class="text-primary display-1 fw-bolder text-uppercase" data-aos="fade-down" data-aos-delay="100">
                <?= get_field('about_title'); ?>
            </h1>
            <p class="text-justify fs-6 text-light lh-lg text-capitalize" data-aos="fade-down" data-aos-delay="300">
                <?= get_field('about_text'); ?>
            </p>
            <?php
            $hero = get_field('about_button');
            if ($hero): ?>
                <div data-aos="fade-down" data-aos-delay="500">
                    <a class="button-white button" href="<?= $hero['url']; ?>">
                        <?= $hero['title']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-5" data-aos="fade-left" data-aos-delay="300">
            <div class="-translate-middle-y custom-border" >
                <div class="swiper swiperAbout" >
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('about_us_gallery')):
                            while (have_rows('about_us_gallery')) : the_row();
                                $image = get_sub_field('image'); ?>
                                <div class="swiper-slide">
                                    <div class="ratio ratio-16x9">
                                        <img class="object-fit-cover" src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                        
                    </div>
                </div>
                <div class="swiper-pagination-about d-flex justify-content-center pt-2"></div>
            </div>
        </div>
    </div>

</section>

