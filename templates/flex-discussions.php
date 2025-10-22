<?php
/**
 * ACF Flexible Layout: Discussions
 */
$background = $args['background'] ?? '';
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$content_repeater = $args['content_repeater'] ?? [];
$button = $args['button'] ?? [];
?>
<style>
    @media(max-width: 768px) {
        .discs {
            background: none !important;
        }
    }
</style>

<section class="relative pb-10 lg:pb-[97px]" >
<div class="block md:hidden h-[320px]" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;"></div>
    <div class="pb-[30px] md:pb-[46px] discs" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
        <div class="pl-[15px] pr-[15px] lg:pr-0 md:pl-[25px] lg:pl-[calc((100%-1024px)/2)] xl:pl-[calc((100%-1296px)/2)] mt-10 flex flex-col md:flex-row md:items-end min-h-auto md:min-h-[700px] justify-between">
            <h2 class="text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-archivo font-light uppercase text-black md:text-white max-w-full md:max-w-[600px]"><?= esc_html($title) ?></h2>
            <div class="mb-0 md:mb-6 text-xl text-gray-600 pb-[10px] border-b border-t border-solid border-white md:max-w-[448px]">
                <div class="p-0 pt-5 lg:pr-[75px] lg:py-[30px] uppercase text-black md:text-white font-archivo font-light text-h6 leading-h6">
                    <?= esc_html($subtitle) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        
        <?php if(is_array($content_repeater)): ?>
            <div class="pl-[42px] relative flex flex-col gap-[27px] md:gap-4 mb-[30px] md:mb-[51px] mt-[40px] md:mt-0">
                <div class="absolute left-3 top-[34px] lg:top-0 w-[1px] h-[90%] lg:h-[96%] bg-black-20"></div>
                <?php foreach($content_repeater as $item): ?>
                    <div class=" mt-0 lg:mt-[60px] flex flex-col gap-2 relative">
                        <div class="absolute top-[45%] left-[-42px] -translate-y-1/2 w-6 h-6 bg-black rounded-full"></div>

                        <div class="font-archivo text-label leading-label text-black-60 font-light uppercase"><?= esc_html($item['label']) ?></div>
                        <div class="font-archivo text-[24px] leading-[24px] md:text-[28px] md:leading-[28px] lg:text-h4 lg:leading-h4 text-black font-light uppercase"><?= esc_html($item['title']) ?></div>
                        <div class="font-archivo text-base md:text-medium leading-base md:leading-medium text-black font-light"><?= wp_kses_post($item['text']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($button['title']) && !empty($button['link'])): ?>
                <a class="group relative flex justify-center items-center w-full md:w-auto md:inline-block px-10 py-[15px] md:py-[22px] font-light uppercase text-medium leading-medium font-archivo text-white bg-gradient-to-r from-[#0065CA] to-[#37B6FF] transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl overflow-hidden" href="#form-reg">
                    <?= esc_html($button['title']) ?>
                    <span
                    aria-hidden="true"
                    class="absolute top-0 left-0 w-full h-full -translate-x-48 transform 
                        bg-gradient-to-r from-white/40 via-white/20 to-white/0
                        opacity-0 transition-all duration-800 ease-in-out
                        group-hover:translate-x-56 group-hover:opacity-100 pointer-events-none"></span>
                </a>
        <?php endif; ?>
    </div>
</section>
