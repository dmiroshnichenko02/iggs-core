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
<section class="relative pb-[97px]" >
    <div class="pb-[46px]" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
        <div class="pl-[calc((100%-1296px)/2)] flex items-end min-h-[700px] justify-between">
            <h2 class="text-h2 leading-h2 font-archivo font-light uppercase text-white max-w-[600px]"><?= esc_html($title) ?></h2>
            <div class="mb-6 text-xl text-gray-600 pb-[10px] border-b border-t border-solid border-white max-w-[448px]">
                <div class="pr-[75px] py-[30px] uppercase text-white font-archivo font-light text-h6 leading-h6">
                    <?= esc_html($subtitle) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        
        <?php if(is_array($content_repeater)): ?>
            <div class="pl-[42px] relative flex flex-col gap-4 mb-[51px]">
                <div class="absolute left-3 top-0 w-[1px] h-[96%] bg-black-20"></div>
                <?php foreach($content_repeater as $item): ?>
                    <div class="mt-[60px] flex flex-col gap-2 relative">
                        <div class="absolute top-[45%] left-[-42px] -translate-y-1/2 w-6 h-6 bg-black rounded-full"></div>

                        <div class="font-archivo text-label leading-label text-black-60 font-light uppercase"><?= esc_html($item['label']) ?></div>
                        <div class="font-archivo text-h4 leading-h4 text-black font-light uppercase"><?= esc_html($item['title']) ?></div>
                        <div class="font-archivo text-medium leading-medium text-black font-light"><?= wp_kses_post($item['text']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($button['title']) && !empty($button['link'])): ?>
                <a class="bg-[linear-gradient(90deg,_#0065CA_0%,_#37B6FF_100%)] inline-block text-white font-archivo text-medium leading-medium px-[53px] py-[22px] transition" href="<?= esc_url($button['link']) ?>">
                    <?= esc_html($button['title']) ?>
                </a>
        <?php endif; ?>
    </div>
</section>
