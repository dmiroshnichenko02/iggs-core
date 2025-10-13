<?php
/**
 * ACF Flexible Layout: Discussions
 */
$background = $args['background'] ?? '';
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$content_repeater = $args['content_repeater'] ?? [];
$button = $args['button'] ?? [];
?>
<section class="relative py-16 mb-16 flex flex-col gap-8" style="background-image:url('<?= esc_url($background) ?>');background-size:cover;background-position:center;">
    <div class="container mx-auto px-6 md:px-16">
        <h2 class="text-3xl font-bold mb-4"><?= esc_html($title) ?></h2>
        <div class="mb-6 text-xl text-gray-600"><?= esc_html($subtitle) ?></div>
        <?php if(is_array($content_repeater)): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <?php foreach($content_repeater as $item): ?>
                    <div class="bg-white rounded shadow p-4">
                        <div class="font-semibold text-lg mb-2"><?= esc_html($item['label']) ?></div>
                        <div class="font-bold text-xl mb-2"><?= esc_html($item['title']) ?></div>
                        <div class="prose prose-sm max-w-none"><?= wp_kses_post($item['text']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($button['title']) && !empty($button['link'])): ?>
            <div>
                <a class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800 transition" href="<?= esc_url($button['link']) ?>">
                    <?= esc_html($button['title']) ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
