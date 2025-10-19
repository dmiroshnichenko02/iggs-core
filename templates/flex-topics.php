<?php
/**
 * ACF Flexible Layout: Topics
 */
$title = $args['title'] ?? '';
$reg_button = $args['reg_button'] ?? [];
?>

<section class="pt-[90px]">
    <div class="container mx-auto">
        <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-black max-w-[678px] mb-[42px]"><?= esc_html($title) ?></h2>
        <div class="topics grid md:grid-cols-1 lg:grid-cols-2 gap-8">
        <?php
        $args_topics = array(
            'post_type'      => 'topic',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        );
        $topics_query = new WP_Query($args_topics);

        if ($topics_query->have_posts()):
            while ($topics_query->have_posts()): $topics_query->the_post();
                $topic_title = get_the_title();
                $feature = get_field('feature');
                $presentation_content = get_field('presentation_content');
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
            <div class="bg-[#F7F7F7] flex flex-col items-start">
                <?php if ($thumbnail_url): ?>
                    <img 
                        src="<?= esc_url($thumbnail_url); ?>" 
                        alt="<?= esc_attr($topic_title); ?>" 
                        class="mb-[28px] w-full h-[345px] object-cover"
                    >
                <?php endif; ?>

                <div class=" px-[28px] pb-[52px]">
                    <?php if (!empty($topic_title)): ?>
                        <h3 class="font-archivo font-light text-h3 leading-h3 text-black mb-5 uppercase"><?= esc_html($topic_title); ?></h3>
                    <?php endif; ?>
                   <div class="li-content pl-5">
                   <?php
                    if ($presentation_content) {
                       
                        echo $presentation_content;
                    }
                    ?>
                   </div>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
        ?>
            <div class="text-gray-500">No topics found.</div>
        <?php endif; ?>
        </div>

        <div class="flex mt-[49px] mb-[90px] gap-3">
            <?php if (!empty($reg_button['title']) && !empty($reg_button['link'])): ?>
                <a class="bg-[linear-gradient(90deg,_#0065CA_0%,_#37B6FF_100%)] inline-block uppercase text-white font-archivo text-medium leading-medium px-[53px] py-[22px] transition" href="<?= esc_url($reg_button['link']) ?>"><?= esc_html($reg_button['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-[87px]"></div>
</section>

<style>
    
    .li-content li{
        list-style-type: disc;
    }
</style>