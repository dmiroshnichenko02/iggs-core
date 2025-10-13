<?php

get_header();
?>
<main id="primary" class="site-main">
        <?php
        $content = get_field('content');
        if (!empty($content) && is_array($content)) {
            foreach($content as $layout) {
                $layout_name = $layout['acf_fc_layout'];
                $template_file = __DIR__ . '/templates/flex-' . str_replace('_', '-', $layout_name) . '.php';
                if (file_exists($template_file)) {
                    $args = $layout;
                    include $template_file;
                } else {
                    echo '<div class="border p-4 mb-6">No template in layout: ' . esc_html($layout_name) . '</div>';
                }
            }
        } else {
            echo '<div class="text-gray-400">No Content in ACF Flexible Content.</div>';
        }
        ?>
</main>
<?php get_footer(); ?>
