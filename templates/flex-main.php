<?php
/**
 * ACF Flexible Layout: Main
 */
$title = $args['title'] ?? '';
$date = $args['date'] ?? '';
$location = $args['location'] ?? '';
$button = $args['button'] ?? [];
$right_column = $args['right_column'] ?? [];
$background = $args['background'] ?? '';
$background_mobile = $args['background_mobile'] ?? '';
?>
<section class="relative" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
    <div class=" pl-[15px] pr-[15px] lg:pr-0 md:pl-[25px] lg:pl-[calc((100%-1024px)/2)] xl:pl-[calc((100%-1296px)/2)]">
     <div class="flex flex-col lg:flex-row gap-8 justify-end lg:justify-between h-[568px] lg:h-[800px] pb-4 lg:pt-[212px] lg:pb-[76px]">
    <div class="flex flex-col justify-end max-w-[570px]">
        <h1 class="text-h2-m leading-h2-m md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo mb-[6px] lg:mb-[44px] text-white uppercase"><?= esc_html($title) ?></h1>
        <div class="flex flex-col lg:flex-row justify-between gap-[25px] lg:gap-8 items-start max-w-[560px]">
        <div>
            <h3 class="text-[22px] leading-[22px] lg:text-h3 lg:leading-h3 uppercase text-white font-archivo font-light mb-[13px]"><?= esc_html($date) ?></h3>
            <h6 class="text-[14px] leading-[14px] lg:text-h6 lg:leading-h6 text-white font-archivo uppercase font-light"><?= esc_html($location) ?></h4>
        </div>
        <?php if (!empty($button['text']) && !empty($button['link'])): ?>
            <a class="w-full md:w-auto px-[37px] py-4 text-black bg-white font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white flex justify-center items-center md:block" href="<?= esc_url($button['link']) ?>">
                <?= esc_html($button['text']) ?>
            </a>
        <?php endif; ?>
        </div>
    </div>
    <?php if(is_array($right_column) && count($right_column)): ?>
    <div class="items-end hidden lg:flex flex-col max-w-[448px] gap-10">
        <?php foreach($right_column as $col): ?>
            <div class="border-b border-solid border-white w-full flex flex-col justify-end items-start">
                <div class="font-archivo text-white text-h6 leading-h6 font-light mb-2"><?= wp_kses_post($col['title']) ?></div>
                <?php if($col['count'] != ''): ?><div class="font-archivo text-white text-[96px] leading-[96px] font-light"><?= esc_html($col['count'] ?? '') ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
        </div>
    <?php endif; ?>
        </div>
</section>

<section class="block lg:hidden w-full px-[15px] pt-[25px] pb-[15px]" style="background-image:url('<?= esc_url($background_mobile) ?>');background-size:cover;background-position:center;">
<?php if(is_array($right_column) && count($right_column)): ?>
    <div class="items-end flex flex-col max-w-[448px] gap-10">
        <?php foreach($right_column as $col): ?>
            <div class="border-b border-solid border-white w-full flex flex-col justify-end items-start">
                <div class="font-archivo text-white text-base leading-base font-light mb-2"><?= wp_kses_post($col['title']) ?></div>
                <?php if($col['count'] != ''): ?><div class="font-archivo text-white text-[64px] leading-[64px] font-light"><?= esc_html($col['count'] ?? '') ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
        </div>
    <?php endif; ?>
</section>
