<section
        class="h-100 w-100 position-relative row align-items-center px-0 mx-0 pb-5 pb-lg-0 justify-content-center justify-content-lg-end bg-secondary"
        data-name="<?= get_field('section_name_4'); ?>">

    <div class="col-lg-10 col-12 row justify-content-md-start justify-content-center align-items-center">
        <div class="col-lg-6 px-0">
            <h1 class="text-primary display-5 fw-bolder" data-aos="fade-down" data-aos-delay="100">
                <?= get_field('history_title'); ?>
            </h1>
        </div>
        <div class="row px-0">
            <div class="col-lg-12 px-0">
                <div class="swiper swiperHistory pt-lg-5">
                    <!-- If we need pagination -->
                    <div class="autoplay-progress" data-aos="fade-right" data-aos-delay="300">
                        <svg viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20"></circle>
                        </svg>
                        <span></span>
                    </div>
                    <ul class="swiper-pagination-history base-timeline justify-content-center justify-content-lg-start align-items-center row d-flex ps-4 ps-md-0 gx-5 gx-lg-0 py-lg-2 mb-2 mb-lg-5"></ul>
                    <div class="swiper-wrapper">
                        <?php
                        $repeater_data = get_field('history_timeline');
                        $repeater_length = count($repeater_data);
                        if (have_rows('history_timeline')):
                            $index =1;
                            while (have_rows('history_timeline')) : the_row();
                                $index++;
                                $date = get_sub_field('date');
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                $image = get_sub_field('image'); ?>
                                <div class="swiper-slide bg-secondary" data-name="<?= $date; ?>" >
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 data-aos="fade-in" data-aos-delay="100" class="text-primary"><?= $title; ?></h4>
                                            <div class="text-white text-justify fs-6 fw-lighter lh-lg mt-5" data-aos="fade-in" data-aos-delay="300"><?= $text; ?></div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="ratio ratio-4x3" data-aos="fade-left" data-aos-delay="500">
                                                <img class="object-fit-contain" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>

