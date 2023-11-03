<section class="h-100 w-100 position-relative section2 aos-remover"
         data-name="hero">

    <div class="h-100">
        <?php
        $hero_video = get_field('hero_video');
        if ($hero_video): ?>
            <div class="h-100">
                <video id="hero_video" autoplay muted loop playsinline width="100%" class="w-100 h-100 object-fit-cover">
                    <source src="<?php echo esc_url($hero_video['url']); ?>" type="video/mp4">
                </video>
            </div>
        <?php endif; ?>
        <button id="mute-button" class="position-absolute bg-white rounded-circle border-0 d-flex justify-content-center align-items-center p-2" style="bottom: 20px;right: 20px">
            <i id="mute-icon" class="bi bi-volume-mute fs-5 lh-0"></i>
        </button>
    </div>
</section>

