<?php
/**
 * ACF Flexible Layout: Formats
 */
$title = $args['title'] ?? '';
$recommend = $args['recommend'][0] ?? '';
$recommend_background = $args['recommend_background'] ?? '';
?>

<section class=" py-10 lg:py-[90px]">
    <div class="container mx-auto">
        <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black max-w-[678px] mb-5 lg:mb-[79px]"><?= esc_html($title) ?></h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-[30px] md:gap-x-[16px] md:gap-y-[32px]">
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
                    @media(max-width: 768px) {
                        .format-item:first-of-type {
                            margin-bottom: 50px !important;
                        }
                    }
                </style>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.body.addEventListener('click', function(e) {
                        const btn = e.target.closest('.buy-ticket-btn');
                        if (btn) {
                            e.preventDefault();
                            var valueToSelect = btn.getAttribute('data-format-slug');
                            var formReg = document.querySelector('.form-reg');
                            if (formReg) {
                                var select = formReg.querySelector('select');
                                if (select) {
                                    var found = false;
                                    for (var i = 0; i < select.options.length; i++) {
                                        var opt = select.options[i];
                                        if (opt.value === valueToSelect) {
                                            select.selectedIndex = i;
                                            found = true;
                                            break;
                                        }
                                    }
                                    if (!found) {
                                        for (var i = 0; i < select.options.length; i++) {
                                            var opt = select.options[i];
                                            if (opt.text.trim().toLowerCase() === valueToSelect.toLowerCase()) {
                                                select.selectedIndex = i;
                                                break;
                                            }
                                        }
                                    }
                                    select.dispatchEvent(new Event('change', { bubbles: true }));
                                }
                                formReg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            } else {
                                if (btn.getAttribute('href') && btn.getAttribute('href').charAt(0) === '#') {
                                    var targetId = btn.getAttribute('href').substring(1);
                                    var targetElem = document.getElementById(targetId);
                                    if (targetElem) {
                                        targetElem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                    }
                                }
                            }
                        }
                    });
                });
                </script>
               <?php while ($formats_query->have_posts()): $formats_query->the_post();
                    $format_id = get_the_ID();
                    $is_recommend = ($format_id == $recommend);
                    $item_classes = 'format-item min-h-[419px] lg:min-h-[699px] bg-[#F7F7F7] pb-[80px] relative flex flex-col justify-between';
                    if ($is_recommend) {
                        $item_classes .= ' recommend bg-dark-blue';
                    }
                    $item_style = '';
                    if ($is_recommend) {
                        $item_style = 'background-image:url(\'' . esc_url($recommend_background) . '\');background-size:contain;background-position:bottom left; background-repeat:no-repeat;';
                    }
                    $slug = get_post_field('post_name', get_the_ID());
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

                        <div class="mt-auto px-[36px] flex flex-col justify-center items-center">
                            <div class="w-full mt-5 lg:mt-0 h-[1px] mb-[30px] <?= $is_recommend ? 'bg-[rgba(255,255,255,0.1)]' : 'bg-[#e5e5e5]' ?>"></div>

                            <?php
                            ?>

                            <?php if (!$is_recommend): ?>
                                <a
                                    class="buy-ticket-btn group relative flex justify-center items-center lg:inline-block w-full md:w-auto px-[53px] py-[22px] font-light uppercase text-medium leading-medium font-archivo text-white bg-gradient-to-r from-[#0065CA] to-[#37B6FF] transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl overflow-hidden"
                                    href="#<?= esc_attr($slug) ?>"
                                    data-format-slug="<?= esc_attr($slug) ?>"
                                >BUY TICKET
                                <span
                                    aria-hidden="true"
                                    class="absolute top-0 left-0 w-full h-full -translate-x-48 transform 
                                        bg-gradient-to-r from-white/40 via-white/20 to-white/0
                                        opacity-0 transition-all duration-800 ease-in-out
                                        group-hover:translate-x-56 group-hover:opacity-100 pointer-events-none"></span>
                                </a>
                            <?php else: ?>
                                <a
                                    class="buy-ticket-btn px-[37px] py-[22px] text-black bg-white font-archivo font-normal text-medium leading-medium transition duration-300 hover:bg-dark-blue hover:text-white flex justify-center items-center lg:inline-block w-full md:w-auto w-full text-center"
                                    href="#<?= esc_attr($slug) ?>"
                                    data-format-slug="<?= esc_attr($slug) ?>"
                                >BUY TICKET</a>
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