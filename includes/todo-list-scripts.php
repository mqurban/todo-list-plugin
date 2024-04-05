<?php

// Check if admin
if (is_admin()) {
    // Add scripts
    function todo_list_admin_scripts()
    {
        wp_enqueue_style('todo-list_admin-styles', plugins_url('/todo-list/css/styles-admin.css'));
    }

    add_action('admin_init', 'todo_list_admin_scripts');
}


//  Add Scripts
function todo_list_scripts()
{
    wp_enqueue_style('todo-list-main-styles', plugins_url('/todo-list/css/styles.css'));
    wp_enqueue_script('todo-list-javascript', plugins_url('/todo-list/js/main.js'));
}

add_action('wp_enqueue_scripts', 'todo_list_scripts');
