<?php
/**
 * ACF Flexible Layout: Speakers
 */
$title = $args['title'] ?? '';
$reg_button = $args['reg_button'] ?? [];
$see_button = $args['see_button'] ?? [];
?>
<section id="speakers">
    <div class="container mx-auto">
        <?php
        $args_speakers = array(
            'post_type'      => 'speaker',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        );
        $speakers_query = new WP_Query($args_speakers);
        $count = $speakers_query->found_posts;

        $speakers_per_row = wp_is_mobile() ? 2 : 5;
        $visible_rows = 3;
        $max_visible = $speakers_per_row * $visible_rows;
        $gradient_needed = false;

        if ($speakers_query->have_posts()) {
            $total_speakers = $speakers_query->found_posts;
            $visible_rows_current = ceil(min($total_speakers, $max_visible) / $speakers_per_row);
            if ($visible_rows_current == 2) {
                $gradient_needed = true;
            }
        }
        ?>
        <div class="flex flex-col lg:flex-row gap-5 justify-between lg:items-end">
            <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-black max-w-[678px]"><?= esc_html($title) ?></h2>
            <?php if ($count): ?><div class="text-[64px] leading-[64px] lg:text-[128px] lg:leading-[128px] font-light font-archivo text-black count"><?= esc_html($count) ?></div><?php endif; ?>
        </div>
        <div class="post-type mb-5 mt-[30px] lg:mt-[51px]" style="position: relative;">
            <?php if ($speakers_query->have_posts()): ?>
                <div class="speakers-grid grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-[18px] gap-y-[30px] overflow-hidden transition-all duration-500 relative" style="max-height: none;">
                    <?php
                    $speaker_index = 0;
                    while ($speakers_query->have_posts()): $speakers_query->the_post(); 
                        $post_id = get_the_ID();
                        $title = get_the_title();
                        $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
                        $company_name = get_field('company_name', $post_id);
                        $honorable_guest = get_field('honorable_guest', $post_id);
                        $company_logo = get_field('company_logo', $post_id);
                        $categories = get_the_terms($post_id, 'speaker_tax');
                        $categories_string = (!empty($categories) && !is_wp_error($categories)) ? implode(', ', array_map(function($cat){ return $cat->name; }, $categories)) : '';
                        $speaker_index++;
                        $extra_class = ($speaker_index > $max_visible) ? ' speaker-hidden' : '';
                    ?>
                        <div class="speaker-card flex flex-col overflow-hidden group relative<?= $extra_class ?>">
                            <div class="relative overflow-hidden">
                                <?php if ($featured_img_url): ?>
                                    <div class="w=[243px] h-[244px] object-cover overflow-hidden">
                                        <img src="<?= esc_url($featured_img_url); ?>" alt="<?= esc_attr($title); ?>" class="w-[280px] h-[280px] object-cover block">
                                    </div>
                                <?php endif; ?>
                                <?php if ($categories_string): ?>
                                    <div class="absolute bottom-[-100px] font-light font-archivo uppercase text-center w-[calc(100%-20px)] left-[10px] bg-black text-white text-label leading-label px-[14px] py-[10px] opacity-0 group-hover:opacity-100 transition-all duration-400 z-20 group-hover:bottom-[10px]">
                                        <?= esc_html($categories_string); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-col items-center pt-3">
                                <?php if ($company_logo): ?>
                                    <div class="mb-3">
                                        <img src="<?= esc_url(is_array($company_logo) ? $company_logo['url'] : $company_logo); ?>" alt="Company logo" class="w-[130px] h-[51px] object-cover">
                                    </div>
                                    <div class="w-full h-[1px] bg-[#DDDDDD] mb-5"></div>
                                <?php endif; ?>
                                <div class="font-archivo text-base text-black text-center uppercase font-semibold mb-2 leading-tight min-h-[44px]"><?= esc_html($title); ?></div>
                                <?php if ($company_name): ?>
                                    <div class="font-archivo text-xs text-black-56 text-center uppercase mb-1"><?= esc_html($company_name); ?></div>
                                <?php endif; ?>
                                <?php if ($honorable_guest): ?>
                                    <div class="text-xs text-white px-2 py-1  font-archivo uppercase z-30">
                                        <?php echo $honorable_guest; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                    <div class="speakers-gradient-overlay-absolute"></div>
            <?php else: ?>
                <div class="text-gray-500">No speakers found.</div>
            <?php endif; ?>
        </div>
        <div class="flex flex-col-reverse lg:flex-row mb-10 lg:mb-[73px] gap-3">
            <?php if (!empty($reg_button['title']) && !empty($reg_button['link'])): ?>
                <a class="group relative flex justify-center items-center lg:inline-block px-[53px] py-[22px] font-light uppercase text-medium leading-medium font-archivo text-white bg-gradient-to-r from-[#0065CA] to-[#37B6FF] transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl overflow-hidden" href="#form-reg">
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
                <a class="see-all font-archivo uppercase border-[#E5E5E5] border border-solid flex justify-center items-center lg:inline-block px-[53px] py-[22px] text-black text-base leading-[16px] transition hover:text-white hover:border-white hover:bg-dark-blue" href="<?= esc_url($see_button['link']) ?>"><?= esc_html($see_button['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-10 lg:mt-[87px]"></div>
</section>

<style>
    .speaker-hidden {
        display: none;
    }
    .speakers-show-all .speaker-hidden {
        display: flex;
    }
    .speakers-grid {
        position: relative;
    }
    .speakers-gradient-overlay-absolute {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 450px;
        width: 100%;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
        pointer-events: none;
        z-index: 100;
    }
    .post-type {
        position: relative;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const speakersGrid = document.querySelector('.speakers-grid');
        const seeBtn = document.querySelector('.see-all');
        const gradientOverlay = document.querySelector('.speakers-gradient-overlay-absolute');
        if (!speakersGrid) return;
        if (seeBtn) {
            seeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                speakersGrid.classList.add('speakers-show-all');
                seeBtn.style.display = 'none';
                if (gradientOverlay) {
                    gradientOverlay.style.display = 'none';
                }
            });
            const hiddenSpeakers = speakersGrid.querySelectorAll('.speaker-hidden');
            if (hiddenSpeakers.length === 0) {
                seeBtn.style.display = 'none';
                if (gradientOverlay) {
                    gradientOverlay.style.display = 'none';
                }
            }
        }
    });
</script>
