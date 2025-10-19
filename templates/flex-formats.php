<?php
/**
 * ACF Flexible Layout: Formats
 */
$title = $args['title'] ?? '';
$recommend = $args['recommend'][0] ?? '';
$recommend_background = $args['recommend_background'] ?? '';
?>

<section class="py-[90px]">
    <div class="container mx-auto">
        <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-black max-w-[678px] mb-[79px]"><?= esc_html($title) ?></h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-x-[16px] gap-y-[32px]">
            <?php
            $formats_query = new WP_Query([
                'post_type'      => 'participation',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            ]);
            if ($formats_query->have_posts()): ?>
                <style>
                    .recommend .text-cont {
                        color: #fff;
                    }
                    .text-cont {
                        font-family: "Archivo";
                        font-size: 18px;
                        font-weight: 300;
                        line-height: 24px;
                        color: #000;
                        padding-left: 20px;
                    }
                    .text-cont li {
                        list-style-type: disc;
                    }
                </style>
               <?php while ($formats_query->have_posts()): $formats_query->the_post();
                    $format_id = get_the_ID();
                    $is_recommend = ($format_id == $recommend);
                    $item_classes = 'format-item min-h-[699px] bg-[#F7F7F7] pb-[80px] relative flex flex-col justify-between';
                    if ($is_recommend) {
                        $item_classes .= ' recommend bg-dark-blue';
                    }
                    $item_style = '';
                    if ($is_recommend) {
                        $item_style = 'background-image:url(\'' . esc_url($recommend_background) . '\');background-size:contain;background-position:bottom left; background-repeat:no-repeat;';
                    }
                    ?>
                    <div class="<?= esc_attr($item_classes) ?>"<?= $item_style ? ' style="' . esc_attr($item_style) . '"' : '' ?>>
                        <div class="absolute bg-white w-[87px] h-[87px] rounded-full bottom-[-43px] left-1/2 -translate-x-1/2"></div>
                        <div class="pt-[26px] px-[25px]">
                            <h3 class="text-[26px] leading-[26px] uppercase mb-[17px] font-archivo font-light <?= $is_recommend ? 'text-white' : 'text-black' ?>">
                                <?php the_title(); ?>
                            </h3>
                            <div class="text-cont">
                                <?php the_content(); ?>
                            </div>
                            <?php if ($is_recommend): ?>
                                <span class="absolute top-[-46px] left-0 h-[46px] w-full bg-[#ff538f] uppercase font-archivo font-light text-lable leading-label text-[#f7f7f7] flex justify-center items-center">We Recommend</span>
                            <?php endif; ?>
                        </div>

                        <div class="mt-auto px-[36px]">
                            <div class="w-full h-[1px] mb-[30px] <?= $is_recommend ? 'bg-[rgba(255,255,255,0.1)]' : 'bg-[#e5e5e5]' ?>"></div>
                            <?php
                            // Use post slug as anchor for more robust linking
                            $slug = get_post_field('post_name', get_the_ID());
                            $buy_ticket_href = '#' . esc_attr($slug);
                            ?>
                            <?php if (!$is_recommend): ?>
                                <a class="bg-[linear-gradient(90deg,_#0065CA_0%,_#37B6FF_100%)] inline-block uppercase w-full text-center text-white font-archivo text-medium leading-medium px-[53px] py-[22px] transition" href="<?= $buy_ticket_href ?>">BUY TICKET</a>
                            <?php else: ?>
                                <a class="px-[37px] py-[22px] text-black bg-white font-archivo font-normal text-medium leading-medium transition duration-300 hover:bg-dark-blue hover:text-white inline-block w-full text-center" href="<?= $buy_ticket_href ?>">BUY TICKET</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else: ?>
                <div><?php esc_html_e('No formats found.', 'iggs-landing'); ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>