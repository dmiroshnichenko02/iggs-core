<?php
/**
 * ACF Flexible Layout: Venue
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$location = $args['location'] ?? '';
$logotype = $args['logotype'] ?? '';
$images = $args['images'] ?? [];
$background = $args['background'] ?? '';
?>
<style>
    @media(max-width: 1024px) {
        .bg-c {
            background-size: unset !important;
            padding-bottom: 110px;
        }
    }
</style>
<section id="venue" class="h-auto lg:h-[1072px] pt-[40px] lg:py-[90px] bg-c overflow-hidden" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
    <div class="container mx-auto">
        <div class="w-full flex flex-col lg:flex-row justify-between">
           <div class="md:max-w-[577px]">
                <h2 class="text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-archivo font-light uppercase text-white mb-3"><?= esc_html($title) ?></h2>
                <div class="font-archivo text-base leading-base md:text-medium md:leading-medium text-white font-light mb-[30px]"><?= wp_kses_post($subtitle) ?></div>
                <div class="flex gap-3 items-center font-archivo text-medium leading-medium text-white font-light">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11C9 11.7956 9.31607 12.5587 9.87868 13.1213C10.4413 13.6839 11.2044 14 12 14C12.7956 14 13.5587 13.6839 14.1213 13.1213C14.6839 12.5587 15 11.7956 15 11C15 10.2044 14.6839 9.44129 14.1213 8.87868C13.5587 8.31607 12.7956 8 12 8C11.2044 8 10.4413 8.31607 9.87868 8.87868C9.31607 9.44129 9 10.2044 9 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.657 16.6567L13.414 20.8997C13.039 21.2743 12.5306 21.4848 12.0005 21.4848C11.4704 21.4848 10.962 21.2743 10.587 20.8997L6.343 16.6567C5.22422 15.5379 4.46234 14.1124 4.15369 12.5606C3.84504 11.0087 4.00349 9.40022 4.60901 7.93844C5.21452 6.47665 6.2399 5.22725 7.55548 4.34821C8.87107 3.46918 10.4178 3 12 3C13.5822 3 15.1289 3.46918 16.4445 4.34821C17.7601 5.22725 18.7855 6.47665 19.391 7.93844C19.9965 9.40022 20.155 11.0087 19.8463 12.5606C19.5377 14.1124 18.7758 15.5379 17.657 16.6567Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span><?= esc_html($location) ?></div></span>
           </div>
            <?php if ($logotype): ?>
                <img src="<?= esc_url($logotype) ?>" alt="Venue logo" class="h-[105px] w-[240px] object-cover mt-10 lg:mt-0" />
            <?php endif; ?>
        </div>
    </div>
    <?php if (is_array($images) && count($images) > 0): ?>
        <div class="pl-[15px] lg:pr-0 md:pl-[25px] lg:pl-[calc((100%-1024px)/2)] xl:pl-[calc((100%-1296px)/2)] relative mt-[45px]">
            <div class="swiper venue-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $img):
                        $src = is_array($img['image']) ? $img['image']['url'] ?? '' : $img['image']; ?>
                        <?php if ($src): ?>
                            <div class="swiper-slide">
                                <img src="<?= esc_url($src) ?>" alt="Venue gallery image" class="object-cover h-[183px] md:h-[260px] lg:h-[564px] w-full" style="max-width:unset;"/>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="absolute bottom-[-90px] lg:bottom-[-104px] left-[15px] lg:left-[unset] right-[unset] lg:right-[25px] xl:right-[calc((100%-1296px)/2)] flex gap-4 z-20">
                    <button class="venue-swiper-button-prev w-[44px] h-[44px] lg:w-[63px] lg:h-[63px] flex items-center justify-center rounded-full cursor-pointer bg-[#F5F5F5] hover:bg-[#BCBCBC]" type="button">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_322_1022)">
                        <path d="M13.5 7L0.499999 7M0.499999 7L6.5 1M0.499999 7L6.5 13" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_322_1022">
                        <rect width="14" height="14" fill="white" transform="translate(0 14) rotate(-90)"/>
                        </clipPath>
                        </defs>
                    </svg>
                    </button>
                    <button class="venue-swiper-button-next w-[44px] h-[44px] lg:w-[63px] lg:h-[63px] flex items-center justify-center rounded-full cursor-pointer bg-[#F5F5F5] hover:bg-[#BCBCBC]" type="button">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_322_1020)">
                        <path d="M0.500001 7L13.5 7M13.5 7L7.5 13M13.5 7L7.5 1" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_322_1020">
                        <rect width="14" height="14" fill="white" transform="translate(14) rotate(90)"/>
                        </clipPath>
                        </defs>
                    </svg>
                    </button>
                </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.venue-swiper', {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 24,
                navigation: {
                    nextEl: '.venue-swiper-button-next',
                    prevEl: '.venue-swiper-button-prev',
                },
                breakpoints: {
                    320: { slidesPerView: 1.5 },
                    900: { slidesPerView: 2 }
                }
            });
        });
        </script>
    <?php endif; ?>
</section>
