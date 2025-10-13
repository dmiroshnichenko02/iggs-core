<?php
/**
 * ACF Flexible Layout: Main
 */
$title = $args['title'] ?? '';
$date = $args['date'] ?? '';
$location = $args['location'] ?? '';
$button = $args['button'] ?? [];
$right_column = $args['right_column'] ?? [];
$background = $args['background'] ?? '';
?>
<section class="relative flex flex-col md:flex-row gap-8 mb-16 h-[800px] pt-[220px]" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
    <div class="flex-1">
        <h1 class="text-4xl font-bold mb-4"><?= esc_html($title) ?></h1>
        <div class="mb-2 text-gray-500"><?= esc_html($date) ?><?= $date && $location ? ' — ' : '' ?><?= esc_html($location) ?></div>
        <?php if (!empty($button['text']) && !empty($button['link'])): ?>
            <a class="inline-block mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800 transition" href="<?= esc_url($button['link']) ?>">
                <?= esc_html($button['text']) ?>
            </a>
        <?php endif; ?>
    </div>
    <?php if(is_array($right_column) && count($right_column)): ?>
    <div class="flex-1 grid grid-cols-1 gap-4 content-start px-8 py-10">
        <?php foreach($right_column as $col): ?>
            <div>
                <div class="font-semibold text-lg mb-2"><?= wp_kses_post($col['title']) ?></div>
                <div class="text-2xl font-bold"><?= esc_html($col['count'] ?? '') ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
