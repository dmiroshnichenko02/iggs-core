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

<section class="py-[90px]">
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mb-[90px]"></div>
    <div class="container mx-auto">
        <div class="flex justify-between items-end">
            <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-black max-w-[780px]"><?= esc_html($title) ?></h2>
            <img class="w-[294px] h-[75px]" src="<?php echo $logotype; ?>" alt="logo">
        </div>
    </div>
    <div class="pl-[calc((100%-1296px)/2)] pt-[54px]">
        <div class="min-h-[701px] flex flex-col justify-end pl-[50px] pb-[39px] gap-[34px]" style="background-image:url('<?= esc_url($image) ?>');background-size:cover;background-position:center;">
            <div class="max-w-[755px] text-white text-[20px] font-archivo font-light leading-[24px]">
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