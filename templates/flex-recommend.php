<?php
/**
 * ACF Flexible Layout: Recommend
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$images = $args['images'] ?? [];
$text_content = $args['text_content'] ?? [];
$features = $args['features'] ?? [];
$reg_button = $args['reg_button'] ?? [];
$background_image = $args['background_image'] ?? '';
$mask_image = $args['mask_image'] ?? '';
?>

<section id="exhibit" class="pt-10 lg:pt-[90px]">
    <div class="container mx-auto">
        <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black max-w-[678px] mb-[100px] lg:mb-[217px]"><?= esc_html($title) ?></h2>
    </div>

    <div class="relative min-h-auto lg:min-h-[1383px] pt-[200px] lg:pt-[529px] pb-[66px]" style="background-image:url('<?= esc_url($background_image) ?>');background-size:cover;background-position:center;">
        <?php if (is_array($images) && count($images) > 0): ?>
            <div class="absolute left-0 top-[-70px] lg:top-[-178px] w-full z-10">
                <div class="pl-[15px]  md:pl-[25px] lg:pl-[calc((100%-1024px)/2)] xl:pl-[calc((100%-1296px)/2)]">
                    <div class="swiper recommend-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $img):
                                $src = is_array($img['image']) ? $img['image']['url'] ?? '' : ($img['image'] ?? $img);
                            ?>
                                <?php if ($src): ?>
                                    <div class="swiper-slide">
                                        <img src="<?= esc_url($src) ?>" alt="Recommend image" class="object-cover h-[240px] md:h-[300px] lg:h-[564px] w-full" style="max-width:unset;"/>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="absolute bottom-[-104px] right-[calc((100%-1296px)/2)] flex gap-4 z-20">
                        <button class="recommend-swiper-button-prev w-[63px] h-[63px] flex items-center justify-center rounded-full cursor-pointer bg-[#F5F5F5] hover:bg-[#BCBCBC]" type="button">
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
                        <button class="recommend-swiper-button-next w-[63px] h-[63px] flex items-center justify-center rounded-full cursor-pointer bg-[#F5F5F5] hover:bg-[#BCBCBC]" type="button">
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
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.recommend-swiper', {
                    slidesPerView: 2,
                    loop: true,
                    spaceBetween: 24,
                    navigation: {
                        nextEl: '.recommend-swiper-button-next',
                        prevEl: '.recommend-swiper-button-prev',
                    },
                    breakpoints: {
                        320: { slidesPerView: 1.5 },
                        900: { slidesPerView: 2 }
                    }
                });
            });
            </script>
        <?php endif; ?>
        <div class="container mx-auto">
            <h3 class="text-[32px] lg:text-h4 uppercase leading-[32px] lg:leading-h4 font-light font-archivo text-white mb-[37px]"><?= esc_html($subtitle) ?></h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-[38px] gap-y-[32px]">
                <?php if (is_array($text_content) && count($text_content) > 0): ?>
                    <style>
                        .text-content p{
                            font-family: "Archivo";
                            font-size: 18px;
                            line-height: 24px;
                            color: white;
                            font-weight: 300;
                            border-bottom: 1px solid rgba(255,255,255,0.1);
                            height: 100%;
                            padding: 25px 0;
                        }
                        .text-content:nth-child(-n+4) {
                            border-top: 1px solid rgba(255,255,255,0.1);
                        }
                        @media (max-width: 1024px) {
                            .text-content:nth-child(3) {
                                border-top: none;
                            }
                        }
                    </style>
                    <?php
                        foreach ($text_content as $item):
                            $text = $item['text'] ?? '';
                            if (empty($text)) continue;

                    ?>
                            <div class="text-content">
                                <?php echo $text; ?>
                            </div>
                    <?php
                        endforeach;
                    ?>
                <?php endif; ?>
            </div>

            <?php if (isset($features) && is_array($features) && count($features) > 0): ?>
                <style>
                    .feature-text strong {
                        font-weight: 700;
                    }
                </style>
                <div class="grid md:grid-cols-2 gap-x-[38px] gap-y-[32px] mb-[49px] mt-[64px]">
                    <?php foreach ($features as $feature): 
                        $icon = $feature['icon'] ?? '';
                        $text = $feature['text'] ?? '';
                        if (empty($icon) && empty($text)) continue;
                    ?>
                        <div class="flex flex-col md:flex-row md:items-center gap-5 md:gap-[54px] bg-[rgba(255,255,255,0.05)] px-5 mdLpx-10 py-[28px]">
                            <?php if ($icon): ?>
                                <img src="<?= esc_url($icon); ?>" alt="icon" class="w-[64px] h-[64px] object-contain flex-shrink-0" />
                            <?php endif; ?>
                            <?php if ($text): ?>
                                <div class="feature-text text-white font-archivo text-base leading-[24px] font-light"><?php echo $text; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <a href="#form-reg" class="px-[37px] py-4 text-black bg-white flex justify-center items-center lg:inline-block w-full md:w-auto font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white"><?php echo $reg_button['title']; ?></a>
        </div>
    </div>
</section>