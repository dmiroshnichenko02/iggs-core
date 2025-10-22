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
<section class="py-10 lg:py-[90px]">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between lg:items-end">
            <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black max-w-[660px]"><?= esc_html($title) ?></h2>
            <?php if ($count): ?><div class="text-[64px] leading-[64px] lg:text-[128px] lg:leading-[128px] font-light font-archivo text-black count"><?= esc_html($count) ?></div><?php endif; ?>
        </div>
        <?php if ($image): ?><img src="<?= esc_url($image) ?>" alt="Participants" class="mx-auto mt-[30px] lg:mt-[58px] h-auto w-full object-contain mb-[30px] lg:mb-[48px]" /><?php endif; ?>
        <div class="flex flex-col md:flex-row mb-10 lg:mb-[73px] gap-3">
            <?php if (!empty($reg_button['title']) && !empty($reg_button['link'])): ?>
                <a class="group relative flex justify-center items-center md:inline-block px-10 py-[22px] font-light uppercase text-medium leading-medium font-archivo text-white bg-gradient-to-r from-[#0065CA] to-[#37B6FF]
         transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl overflow-hidden" href="#form-reg">
            <?= esc_html($reg_button['title']) ?>
            <span
                    aria-hidden="true"
                    class="absolute top-0 left-0 w-full h-full -translate-x-48 transform 
                        bg-gradient-to-r from-white/40 via-white/20 to-white/0
                        opacity-0 transition-all duration-800 ease-in-out
                        group-hover:translate-x-56 group-hover:opacity-100 pointer-events-none"></span>
        </a>
            <?php endif; ?>
            <?php if (!empty($see_button['title']) && !empty($see_button['link'])): ?>
                <a class="font-archivo flex justify-center items-center md:inline-block uppercase border-[#E5E5E5] border border-solid px-[53px] py-[22px] text-black text-base leading-[16px] transition hover:text-white hover:border-white hover:bg-dark-blue" href="<?= esc_url($see_button['link']) ?>"><?= esc_html($see_button['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD]"></div>
</section>
