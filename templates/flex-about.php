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

<section id="about" class="py-10 lg:py-[120px]" style="background-image:url('<?= esc_url($background_image) ?>');background-size:cover;background-position:center;">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row gap-5 lg:gap-[80px] justify-between">
            <div class="flex flex-col justify-between">
                <img class="w-[276px] h-[105px]" src="<?php echo $logo; ?>" alt="logo">
                <h2 style="word-break: break-word; overflow-wrap: break-word;" class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-white mt-5 lg:w-[566px] lg:max-w-[566px]"><?= esc_html($title) ?></h2>
            </div>
            <div class="flex flex-col gap-[37px] items-start">
                <div class="text-white font-archivo font-light text-base lg:text-[20px] text-base lg:leading-[20px]">
                    <?php echo $text; ?>
                </div>
                <a class="px-[37px] py-4 flex justify-center items-center lg:inline-block w-full md:w-auto text-black bg-white uppercase font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white" href="#form-reg"><?php echo esc_html($button['title']); ?></a>
            </div>
        </div>
    </div>
</section>