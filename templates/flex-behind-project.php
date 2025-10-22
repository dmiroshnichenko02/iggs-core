<?php
/**
 * ACF Flexible Layout: Behind Project
 */
$title = $args['title'] ?? '';
$image = $args['image'] ?? '';
$logotype = $args['logotype'] ?? '';
$text = $args['text'] ?? '';
$link = $args['link'] ?? '';
?>

<section class="py-10 lg:py-[90px]">
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mb-10 lg:mb-[90px]"></div>
    <div class="container mx-auto">
        <div class="flex flex-col-reverse lg:flex-row justify-between gap-5 lg:items-end">
            <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black xl:max-w-[780px]"><?= esc_html($title) ?></h2>
            <img class="w-[160px] lg:w-[294px] h-[41px] lg:h-[75px]" src="<?php echo $logotype; ?>" alt="logo">
        </div>
    </div>
    <div class="md:pl-[25px] lg:pl-[calc((100%-1024px)/2)] xl:pl-[calc((100%-1296px)/2)] pt-5 lg:pt-[54px]">
    <div class="h-[249px] block md:hidden ml-[15px] mb-5" style="background-image:url('<?= esc_url($image) ?>');background-size:cover;background-position:center;"></div>
        <div class="bg-n lg:min-h-[701px] flex flex-col justify-end pl-[15px] md:pl-[25px] lg:pl-[50px] lg:pb-[39px] gap-[34px]" style="background-image:url('<?= esc_url($image) ?>');background-size:cover;background-position:center;">
            <div class="max-w-[755px] text-black lg:text-white text-base lg:text-[20px] font-archivo font-light leading-base lg:leading-[24px]">
                <?php echo $text; ?>
                <div class="mt-[34px]">
                    <?php if ($link): 
                        $display_link = preg_replace('#^https://www\.#', '', $link);
                    ?>
                        <a href="<?php echo $link; ?>" class=""><?= esc_html($display_link); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>