<?php
/**
 * ACF Flexible Layout: All Participants
 */
$title = $args['title'] ?? '';
$count = $args['count'] ?? '';
$image = $args['image'] ?? '';
$reg_button = $args['reg_button'] ?? [];
$see_button = $args['see_button'] ?? [];
?>
<section class="mb-16 py-16 bg-white text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-4xl font-bold mb-2"><?= esc_html($title) ?></h2>
        <?php if ($count): ?><div class="text-xl mb-4 font-medium text-gray-700"><?= esc_html($count) ?></div><?php endif; ?>
        <?php if ($image): ?><img src="<?= esc_url($image) ?>" alt="Participants" class="mx-auto h-40 object-contain mb-4" /><?php endif; ?>
        <div class="flex flex-col md:flex-row justify-center mt-6 gap-4">
            <?php if (!empty($reg_button['title']) && !empty($reg_button['link'])): ?>
                <a class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-800 transition" href="<?= esc_url($reg_button['link']) ?>"><?= esc_html($reg_button['title']) ?></a>
            <?php endif; ?>
            <?php if (!empty($see_button['title']) && !empty($see_button['link'])): ?>
                <a class="inline-block border border-gray-400 text-gray-800 px-6 py-2 rounded hover:bg-gray-200 transition" href="<?= esc_url($see_button['link']) ?>"><?= esc_html($see_button['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>
