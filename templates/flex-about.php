<?php
/**
 * ACF Flexible Layout: About
 */
$title = $args['title'] ?? '';
$background_image = $args['background_image'] ?? '';
$logo = $args['logo'] ?? '';
$text = $args['text'] ?? '';
$button = $args['button'] ?? '';
?>

<section class="py-[120px]" style="background-image:url('<?= esc_url($background_image) ?>');background-size:cover;background-position:center;">
    <div class="container mx-auto">
        <div class="flex gap-[80px] justify-between">
            <div class="flex flex-col justify-between">
                <img class="w-[276px] h-[105px]" src="<?php echo $logo; ?>" alt="logo">
                <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-white w-[566px] max-w-[566px]"><?= esc_html($title) ?></h2>
            </div>
            <div class="flex flex-col gap-[37px] items-start">
                <div class="text-white font-archivo font-light text-[20px] leading-[20px]">
                    <?php echo $text; ?>
                </div>
                <a class="px-[37px] py-4 text-black bg-white uppercase font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white" href="<?php echo esc_url($button['link']); ?>"><?php echo esc_html($button['title']); ?></a>
            </div>
        </div>
    </div>
</section>