<?php

// List Todos

function todo_list_shortcode($atts, $content = null)
{
    global $post;
    // Create attributes and defaults

    $atts = shortcode_atts(
        array(
            'title' => 'My Todos',
            'count' => 10,
            'category' => 'all'
        ),
        $atts
    );

    // check Category Attributes
    if ($atts['category'] == 'all') {
        $terms = '';
    } else {
        $terms = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['category']

            )
        );
    }
    // Query Args 
    $args = array(
        'post_type'     => 'todo',
        'post_status'   => 'publish',
        'orderby'       => 'due_date',
        'order'         => 'ASC',
        'posts_per_page' => $atts['count'],
        'tax_query'     => $terms,

    );

    // Fetch Todos

    $todos = new WP_Query($args);

    // Check for Todos
    if ($todos->have_posts()) {
        $category = str_replace('-', ' ', $atts['category']);
        $category = strtolower($category);

        // variable for output
        $output = '';

        //  Building output

        $output .= '<div class="todo-list">';
        while ($todos->have_posts()) {
            $todos->the_post();

            // Get Field values

            $priority = get_post_meta($post->ID, 'priority', true);
            $details = get_post_meta($post->ID, 'details', true);
            $due_date = get_post_meta($post->ID, 'due_date', true);

            $output .= '<div class="todo">';
            $output .= '<h4>' . get_the_title() . '</h4>';
            $output .= '<div>' . $details . '</div>';
            $output .= '<div class="priority-' . strtolower($priority) . '">Priority: ' . $priority . '</div>';
            $output .= '<div class="due_date">Due Date: ' . $due_date . '</div>';
            $output  .= '</div>';
        }
        $output .= '</div>';
        // Rest Post Data
        wp_reset_postdata();

        return $output;
    } else {
        return '<p>No Todos</p>';
    }
}

// Todo List Shortcode 

add_shortcode('todos', 'todo_list_shortcode');
