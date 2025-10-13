<?php
add_action('init', function () {
    $cpt_name = !empty(get_option('cpt_1_value')) ? get_option('cpt_1_value') : 'project';
    $cpt_name = str_replace(' ', '_', $cpt_name);
    $cpt_name = strtolower($cpt_name);

    $cpt_label = !empty(get_option('cpt_1_label')) ? get_option('cpt_1_label') : 'Project';
    $cpt_slug  = !empty(get_option('cpt_1_slug')) ? get_option('cpt_1_slug') : 'project';

    $labels = [
        'name'               => $cpt_label,
        'singular_name'      => $cpt_label,
        'menu_name'          => $cpt_label,
        'name_admin_bar'     => $cpt_label,
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New ' . $cpt_label,
        'edit_item'          => 'Edit ' . $cpt_label,
        'new_item'           => 'New ' . $cpt_label,
        'view_item'          => 'View ' . $cpt_label,
        'search_items'       => 'Search ' . $cpt_label,
        'not_found'          => 'No ' . strtolower($cpt_label) . ' found',
        'not_found_in_trash' => 'No ' . strtolower($cpt_label) . ' found in Trash',
        'all_items'          => 'All ' . $cpt_label,
    ];

    register_post_type($cpt_name, [
        'labels'        => $labels,
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => get_option('cpt_1_archive_enabled') ? true : false,
        'hierarchical'  => true,
        'supports'      => ['title', 'thumbnail', 'editor', 'page-attributes', 'excerpt', 'author', 'custom-fields'],
        'taxonomies'    => get_option('cpt_1_tags_enabled') ? ['post_tag'] : [],
        'menu_icon'     => 'dashicons-portfolio',
        'rewrite'       => ['slug' => $cpt_slug],
    ]);
});

add_action('init', function () {
    $cpt_name = !empty(get_option('cpt_1_value')) ? get_option('cpt_1_value') : 'project';
    $cpt_name = str_replace(' ', '_', $cpt_name);
    $cpt_name = strtolower($cpt_name);

    $labels = [
        'name'              => 'Categories',
        'singular_name'     => 'Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    ];

    register_taxonomy(
        $cpt_name . '_tax',
        [$cpt_name],
        [
            'labels'       => $labels,
            'hierarchical' => false,
            'show_in_rest' => true,
            'rewrite'      => ['slug' => 'project-categories'],
        ]
    );
});
