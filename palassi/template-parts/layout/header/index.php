<div class="col-2 d-lg-flex justify-content-start">
    <ul class="list-unstyled d-lg-flex align-items-center d-none justify-content-center mb-0 gap-4">
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
</div>
<a class="navbar-brand z-top col-8 d-flex justify-content-center"

   href="<?php echo esc_url(get_home_url()) ?>">
    <?php
    $logo = get_field('site_logo', 'option');
    ?>
<!--    <img class="lazy"-->
<!--         width="50"-->
<!--         src="--><?php //= $logo['url'] ?><!--"-->
<!--         alt="--><?php //= get_bloginfo('name'); ?><!--">-->
    <span class="Shippori fs-3 text-white fw-bolder">REZA PALASSI</span>
</a>

<div class="col-2 d-flex justify-content-end">
    <div class="menu-toggle d-block " data-bs-toggle="modal" data-bs-target="#headerModal">
        <a class="d-none" href="#">menu</a>
        <div class="lines-button x d-inline-flex align-items-center justify-content-center lazy text-center p-0 m-0">
            <span class="lines bg-white d-inline-block p-0 m-0 position-relative"></span>
        </div>
    </div>
</div>