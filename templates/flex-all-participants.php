<?php
/**
 * ACF Flexible Layout: All Participants
 */
$title = $args['title'] ?? '';
$count = $args['count'] ?? '';
$image = $args['image'] ?? '';
$reg_button = $args['reg_button'] ?? [];
$see_button = $args['see_button'] ?? [];
?>
<section class="py-[90px]">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end">
            <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-black max-w-[660px]"><?= esc_html($title) ?></h2>
            <?php if ($count): ?><div class="text-[128px] leading-[128px] font-light font-archivo text-black count"><?= esc_html($count) ?></div><?php endif; ?>
        </div>
        <?php if ($image): ?><img src="<?= esc_url($image) ?>" alt="Participants" class="mx-auto mt-[58px] h-auto w-full object-contain mb-[48px]" /><?php endif; ?>
        <div class="flex mb-[73px] gap-3">
            <?php if (!empty($reg_button['title']) && !empty($reg_button['link'])): ?>
                <a class="bg-[linear-gradient(90deg,_#0065CA_0%,_#37B6FF_100%)] inline-block text-white font-archivo uppercase text-medium leading-medium px-[53px] py-[22px] transition" href="<?= esc_url($reg_button['link']) ?>"><?= esc_html($reg_button['title']) ?></a>
            <?php endif; ?>
            <?php if (!empty($see_button['title']) && !empty($see_button['link'])): ?>
                <a class="font-archivo uppercase border-[#E5E5E5] border border-solid px-[53px] py-[22px] text-black text-base leading-[16px] transition hover:text-white hover:border-white hover:bg-dark-blue" href="<?= esc_url($see_button['link']) ?>"><?= esc_html($see_button['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD]"></div>
</section>
