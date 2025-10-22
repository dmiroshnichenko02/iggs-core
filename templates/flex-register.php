<?php
/**
 * ACF Flexible Layout: Register
 */
$title = $args['title'] ?? '';
$contact_group = $args['contact_group'] ?? '';
$background = $args['background'] ?? '';
$form_shortcode = $args['form_shortcode'] ?? '';
?>

<style>
    @media(max-width: 768px) {
        .bg-n {
            background: none !important;
        }
        .form-reg {
            padding: 0 !important;
        }
    }
</style>

<section class="pb-10 lg:pb-[90px]">
    <div class="block md:hidden w-full min-h-[288px]" style=" background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;"></div>
    <div class="bg-n" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
        <div class="container mx-auto">
            <div class="h-auto md:h-[700px] flex items-end pb-0 md:pb-[60px]">
                <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black mt-[30px] md:mt-0 md:text-white max-w-[678px] mb-[20px]"><?= esc_html($title) ?></h2>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between items-cemter gap-[60px] mt-5 md:mt-[90px] mb-5 lg:mb-[80px]">
            <div id="form-reg" class="form-custom form-reg w-full">
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
            <div class="min-w-full md:min-w-[384px] mx-auto md:mx-0 w-full md:w-[384px] h-fit bg-dark-blue py-[39px] px-[32px] pb-[100px]" style="background-image:url('<?= esc_url($contact_group['background']) ?>');background-position:bottom right; background-repeat: no-repeat;">
                <h5 class="text-high leading-high text-white font-archivo font-light uppercase mb-[10px]"><?php echo $contact_group['title']; ?></h5>
                <h6 class="text-base leading-base font-archivo font-normal text-white"><?php echo $contact_group['subtitle']; ?></h6>
                <div class="w-full h-[1px] bg-[rgba(217,217,217,0.3)] my-[33px]"></div>
                <?php if (!empty($contact_group['contact_repeater']) && is_array($contact_group['contact_repeater'])): ?>
                    <style>
                        .info-text {
                            color: white;
                            font-family: "Archivo";
                            font-size: 18px;
                            line-height: 18px;
                            font-weight: 400;
                        }
                    </style>
                    <div class="flex flex-col gap-6">
                        <?php foreach ($contact_group['contact_repeater'] as $item): ?>
                            <div class="flex items-center gap-[10px]">
                                <?php if (!empty($item['icon'])): ?>
                                    <img src="<?= esc_url($item['icon']) ?>" alt="" class="w-6 h-6 object-contain">
                                <?php endif; ?>
                                <?php if (!empty($item['text'])): ?>
                                    <div class="info-text text-white text-label leading-label font-archivo font-normal">
                                    <?php echo $item['text']; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-10 lg:mt-[87px]"></div>
</section>