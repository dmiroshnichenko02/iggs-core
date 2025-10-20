<?php
/**
 * ACF Flexible Layout: Sponsors
 */
$button = $args['button'] ?? [];
?>
<section class="pt-[52px] pb-[97px] overflow-hidden">
   <div class="">
        <div class="flex flex-col">
        <?php
        $terms = get_terms([
            'taxonomy' => 'sponsor_tax',
            'hide_empty' => true,
        ]);
        if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $term) :
                $q = new WP_Query([
                    'post_type' => 'sponsor',
                    'tax_query' => [[
                        'taxonomy' => 'sponsor_tax',
                        'field'    => 'term_id',
                        'terms'    => $term->term_id,
                    ]],
                    'posts_per_page' => -1,
                ]);
                if ($q->have_posts()) : ?>
                    <div class="border-b border-solid border-[#DDDDDD] py-[56px]">
                        <div class="flex flex-row items-center gap-[100px] container mx-auto">
                        <div class="max-w-[363px] min-w-[363px] text-high leading-high text-black font-archivo font-light">
                            Among Previous & Current <span><?= esc_html($term->name); ?></span>
                        </div>
                        <div class="flex-1 overflow-hidden w-full relative sponsors-slider-mask-wrap">
                            <div class="sponsors-gradient-mask sponsors-gradient-mask-left absolute top-0 left-0 h-full w-[100px] z-998 bg-[linear-gradient(270deg,rgba(255,255,255,0)_0%,rgba(255,255,255,1)_50%,rgba(255,255,255,1)_100%)]"></div>
                            <div class="sponsors-gradient-mask sponsors-gradient-mask-right absolute top-0 right-0 h-full w-[100px] z-998 bg-[linear-gradient(90deg,rgba(255,255,255,0)_0%,rgba(255,255,255,1)_50%,rgba(255,255,255,1)_100%)]"></div>
                            <div class="relative w-full">
                                <div class="swiper sponsors-swiper">
                                    <div class="swiper-wrapper">
                                        <?php while ($q->have_posts()) : $q->the_post();
                                            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                            $external_url = get_field('external_url');
                                            if (!$img_url) continue;
                                        ?>
                                            <div class="swiper-slide inline-block">
                                                <?php if (!empty($external_url)) : ?>
                                                    <a href="<?= esc_url($external_url); ?>" target="_blank" rel="noopener">
                                                        <img src="<?= esc_url($img_url); ?>" class="max-h-[81px] min-h-[61px] object-contain block cover" alt="<?= esc_attr(get_the_title()); ?>" />
                                                    </a>
                                                <?php else : ?>
                                                    <img src="<?= esc_url($img_url); ?>" class="max-h-[81px] min-h-[61px] object-contain block cover" alt="<?= esc_attr(get_the_title()); ?>" />
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endif;
            endforeach;
        endif;
        ?>
        </div>
        <?php if (!empty($button['text']) && !empty($button['link'])): ?>
            <div class="mt-[47px] container mx-auto">
                <a class="bg-[linear-gradient(90deg,_#0065CA_0%,_#37B6FF_100%)] text-white px-[40px] py-4 transition" href="<?= esc_url($button['link']) ?>"><?= esc_html($button['text']) ?></a>
            </div>
        <?php endif; ?>
        
    </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.sponsors-swiper').forEach(function(slider) {
      let mySwiper = new Swiper(slider, {
        slidesPerView: 'auto',
        spaceBetween: 40,
        loop: true,
        speed: 3000,
        freeMode: true,
        freeModeMomentum: false,
        autoplay: {
          delay: 1,
          disableOnInteraction: false,
          pauseOnMouseEnter: false
        },
        grabCursor: true,
        allowTouchMove: true,
        breakpoints: {
          320: {
            slidesPerView: 2,
            spaceBetween: 24,
          },
          640: {
            slidesPerView: 4,
          },
          1024: {
            slidesPerView: 7,
          }
        },
        navigation: false,
        pagination: false,
        on: {
          init: function(swiper) {
            updateSponsorsGradient(swiper);
          },
          resize: function(swiper) {
            updateSponsorsGradient(swiper);
          },
        }
      });
      function updateSponsorsGradient(swiper) {
        let maskWrap = slider.closest('.sponsors-slider-mask-wrap');
        if (!maskWrap) return;
        let leftMask = maskWrap.querySelector('.sponsors-gradient-mask-left');
        let rightMask = maskWrap.querySelector('.sponsors-gradient-mask-right');
        let slidesPerView = swiper.params.slidesPerView === 'auto' ?  Math.floor(swiper.el.offsetWidth / (swiper.slides[0]?.offsetWidth || 1)) : swiper.params.slidesPerView;
        let slidesCount = swiper.slides.length;
        if (slidesCount <= slidesPerView) {
          leftMask && leftMask.classList.add('hidden');
          rightMask && rightMask.classList.add('hidden');
        } else {
          leftMask && leftMask.classList.remove('hidden');
          rightMask && rightMask.classList.remove('hidden');
        }
      }
    });
  });
</script>
