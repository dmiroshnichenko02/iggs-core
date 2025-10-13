<?php
/**
 * ACF Flexible Layout: Venue
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$location = $args['location'] ?? '';
$logotype = $args['logotype'] ?? '';
$images = $args['images'] ?? [];
?>
<section class="mb-16 py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-16 flex flex-wrap gap-12">
        <div class="w-full md:w-1/2 flex flex-col gap-6">
            <h2 class="text-3xl font-bold mb-2"><?= esc_html($title) ?></h2>
            <div class="mb-2 text-gray-500 text-lg"><?= esc_html($location) ?></div>
            <div class="prose prose-sm max-w-none mb-4"><?= wp_kses_post($subtitle) ?></div>
            <?php if ($logotype): ?>
                <img src="<?= esc_url($logotype) ?>" alt="Venue logo" class="h-20 object-contain" />
            <?php endif; ?>
        </div>
        <?php if (is_array($images) && count($images) > 0): ?>
        <div class="w-full md:w-1/2 grid grid-cols-2 gap-4 place-items-center">
            <?php foreach ($images as $img):
                $src = is_array($img['image']) ? $img['image']['url'] ?? '' : $img['image']; ?>
                <?php if ($src): ?><img src="<?= esc_url($src) ?>" alt="Venue gallery image" class="object-cover rounded-xl shadow-lg" /><?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
