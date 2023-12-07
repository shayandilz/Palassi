<section
        class="h-100 w-100 position-relative row align-items-center px-0 mx-0 justify-content-end bg-secondary pb-5"
        data-name="<?= get_field('section_name_8'); ?>">

    <div class="col-lg-10 col-12 row px-0 justify-content-start align-items-center">
        <div class="col-lg-6">
            <h1 class="text-primary display-5 fw-bolder" data-aos="fade-down" data-aos-delay="100">
                <?= get_field('contact_title'); ?>
            </h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7" data-aos="zoom-in" data-aos-delay="300">
                <?php the_field('map_embed', 'option'); ?>
            </div>
            <div class="col-lg-5 fs-5">
                <div class="d-flex flex-column align-items-start text-start justify-content-center gap-3 fs-6">
                    <?php $mobileNumber = get_field('mobile_number', 'option');
                    if ($mobileNumber) { ?>
                    <div class="d-inline-flex gap-3 align-items-center justify-content-start text-warning" data-aos="fade-down" data-aos-delay="200">
                        <i class="bi bi-phone"></i>
                        <a href="tel:<?= $mobileNumber; ?>">
                            <?= $mobileNumber; ?>
                        </a>
                    </div>
                    <?php }
                    $phoneNumber = get_field('phone_number', 'option');
                    if ($phoneNumber) { ?>
                    <div class="d-inline-flex gap-3 align-items-center justify-content-start text-warning" data-aos="fade-down" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <a href="tel:<?= $phoneNumber; ?>">
                            <?= $phoneNumber; ?>
                        </a>
                    </div>
                    <?php }
                    $email = get_field('email', 'option');
                    if ($email) { ?>
                    <div class="d-inline-flex gap-3 align-items-center justify-content-start text-warning" data-aos="fade-down" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:<?= $email; ?>">
                            <?= $email; ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <ul class="list-unstyled d-flex align-items-center justify-content-start gap-4 border-top border-white my-2 py-3 w-100 border-bottom" data-aos="fade-down" data-aos-delay="500">
                    <?php
                    if (have_rows('social_accounts', 'option')):
                        $first = true; // Variable to track the first <li> element
                        while (have_rows('social_accounts', 'option')) : the_row();
                            $svg = get_sub_field('svg');
                            $url = get_sub_field('urk'); ?>
                            <a href="<?= esc_url($url); ?>">
                                <?= $svg; ?>
                            </a >
                            <?php
                            $first = false;
                        endwhile;
                    endif; ?>
                </ul>
                <div class="d-flex flex-column align-items-start text-start justify-content-center gap-3 fs-6">
                    <?php $addressOffice = get_field('address_one', 'option');
                    if ($addressOffice) { ?>
                        <div class="d-inline-flex gap-3 align-items-center justify-content-start text-warning" data-aos="fade-down" data-aos-delay="600">
                            <i class="bi bi-building"></i>
                            <a href="tel:<?= $addressOffice['url']; ?>">
                                <?= $addressOffice['title']; ?>
                            </a>
                        </div>
                    <?php }
                    $addressStore = get_field('address_store', 'option');
                    if ($addressStore) { ?>
                        <div class="d-inline-flex gap-3 align-items-center justify-content-start text-warning" data-aos="fade-down" data-aos-delay="700">
                            <i class="bi bi-shop"></i>
                            <a href="tel:<?= esc_url($addressStore['url']); ?>">
                                <?= $addressStore['title']; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="border-top border-white mt-2 pt-3" data-aos="fade-down" data-aos-delay="800">
                    <?php echo do_shortcode('[gravityform id="1" title="false"]');  ?>
                </div>
            </div>
        </div>
    </div>

</section>

