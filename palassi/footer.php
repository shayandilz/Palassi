</main>


<!-- Modal -->
<div class="modal fade overflow-y-hidden" id="headerModal" tabindex="-1" aria-labelledby="headerModalLabel"
     aria-hidden="true">
    <div class="menu-toggle-close position-absolute d-block z-top" data-bs-dismiss="modal" aria-label="Close">
        <div class="lines-button-close x d-inline-flex align-items-center justify-content-center lazy text-center p-0 m-0">
            <span class="lines-close d-inline-block p-0 m-0 position-relative"></span>
        </div>
    </div>

    <nav class="modal-dialog h-100 bg-transparent modal-xl menu d-flex justify-content-center flex-column align-items-center">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',
            'menu_class' => 'navbar-nav pe-0 text-white list-unstyled text-center fs-4 w-100 position-relative lh-sm',
            'container' => false,
            'menu_id' => 'navbarTogglerMenu',
            'item_class' => 'nav-item',
            'link_class' => 'nav-link hover-text lazy',
            'depth' => 2,
        ));
        ?>
        <div class="social_icons position-absolute bottom-0 pb-5 mb-3 d-flex flex-column justify-content-center align-items-center gap-3">
            <div>
                <a class="pt-1 d-inline-flex align-items-baseline flex-row-reverse gap-2 lazy" href="tel:<?= get_field('phone_number', 'option'); ?>">
                    <?= get_field('phone_number', 'option'); ?>
                    <i class="bi bi-telephone-fill"></i></a>
            </div>
            <div>
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
        </div>
    </nav>

</div>
<footer>

</footer>

<?php get_template_part('template-parts/layout/backToTop'); ?>
<?php wp_footer(); ?>
</body>
</html>