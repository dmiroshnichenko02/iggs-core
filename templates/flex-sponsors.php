<?php
/**
 * ACF Flexible Layout: Sponsors
 */
$button = $args['button'] ?? [];
?>
<section class="py-12 bg-gray-50 mb-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-center">Спонсоры конференции</h2>
        <?php if (!empty($button['text']) && !empty($button['link'])): ?>
            <div class="flex justify-center mt-8">
                <a class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-800 transition" href="<?= esc_url($button['link']) ?>"><?= esc_html($button['text']) ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>
