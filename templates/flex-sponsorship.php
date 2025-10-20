<?php
/**
 * ACF Flexible Layout: Sponsorship
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$background = $args['background'] ?? '';
?>

<section class="pt-[72px] pb-[112px]" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
    <div class="container mx-auto">
        <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-white max-w-[678px] mb-[11px]"><?= esc_html($title) ?></h2>
        <h5 class="font-archivo font-light text-label leading-label text-white mb-[88px]"><?= esc_html($subtitle) ?></h5>
    </div>
    <?php
    $sponsorship_query = new WP_Query([
        'post_type'      => 'sponsorship',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);
    ?>
    <div class="sponsors pl-[calc((100%-1296px)/2)] flex flex-col gap-[25px]">
        <?php if ($sponsorship_query->have_posts()): ?>
            <?php while ($sponsorship_query->have_posts()): $sponsorship_query->the_post(); ?>
                <?php
                    $title = get_the_title();
                    $content = get_field('content');
                    $color = get_field('color');
                    $star_rate = get_field('star_rate');
                    $button = get_field('button');
                ?>
                <div class="sponsor-item w-full bg-[rgba(0,16,29,0.7)] flex min-h-[244px]">
                    <?php if ($color): ?>
                        <div class="w-[16px] min-h-full" style="background: <?= esc_attr($color); ?>;"></div>
                    <?php endif; ?>
                    <div class="pt-[35px] pb-[32px] pr-[24px] flex w-full justify-between">
                        <div class="pl-[50px] flex flex-col justify-end gap-6">
                            <div class="star-rate flex gap-1 text-[24px]">
                                <?php
                                $rate = intval($star_rate);
                                for ($i = 1; $i <= 5; $i++): 
                                    $star_color = $i <= $rate ? 'rgba(255,255,255,1)' : 'rgba(255,255,255,0.2)';
                                ?>
                                    <span style="color: <?= esc_attr($star_color); ?>;">★</span>
                                <?php endfor; ?>
                            </div>
                            <h3 class="font-archivo text-h4 leading-h4 font-light text-white uppercase"><?= esc_html($title) ?></h3>    
                        </div>

                        <div class="flex justify-between gap-[100px] items-end">
                            <div>
                                <?php if ($content): ?>
                                    <style>
                                        .sponsor-content ul li {
                                            list-style-type: disc;
                                        }
                                        .sponsor-content ul {
                                            padding-left: 20px;
                                        }
                                    </style>
                                    <div class="sponsor-content text-white font-archivo font-light ">
                                        <h6 class="font-archivo font-medium text-label leading-[24px] text-white">You will get:</h6>
                                        <?= wp_kses_post($content) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                                <a class="sponsor-btn px-[93px] py-4 text-black bg-white font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white" href="#partner">
                                    SELECT
                                </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
            <p><?php esc_html_e('No sponsorships found.', 'your-text-domain'); ?></p>
        <?php endif; ?>
    </div>
    
</section>