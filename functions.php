<?php
function my_landing_page_enqueue_styles()
{
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', array(), '2.2.19');

    // Enqueue Slick Carousel styles
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');

    // Enqueue FontAwesome
    wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    // Enqueue main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/output.css');

    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Slick Carousel script
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), null, true);

    // Enqueue custom JavaScript file
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_landing_page_enqueue_styles');


add_theme_support('post-thumbnails');

// Register custom post types
function create_custom_post_types()
{
    // Voter Education Post Type
    register_post_type('voter_education', array(
        'labels' => array(
            'name' => __('Voter Education'),
            'singular_name' => __('Voter Education')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-info', // Icon for the post type
    ));

    // Video Posts Post Type
    register_post_type('video_posts', array(
        'labels' => array(
            'name' => __('Video Posts'),
            'singular_name' => __('Video Post')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-video-alt3',
    ));

    // Election Stories Post Type
    register_post_type('election_stories', array(
        'labels' => array(
            'name' => __('Election Stories'),
            'singular_name' => __('Election Story')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-format-status',
    ));
}
add_action('init', 'create_custom_post_types');

// Add custom fields for Voter Education
function add_voter_education_meta_box()
{
    add_meta_box('voter_education_meta', 'Voter Education Details', 'voter_education_meta_callback', 'voter_education');
}
add_action('add_meta_boxes', 'add_voter_education_meta_box');

function voter_education_meta_callback($post)
{
    wp_nonce_field('save_voter_education_data', 'voter_education_meta_box_nonce');

    $date = get_post_meta($post->ID, '_voter_education_date', true);
    $description = get_post_field('post_content', $post->ID);


    echo '<label for="carousel_description">Description</label>';
    wp_editor($description, 'carousel_description', array('textarea_name' => 'carousel_description'));


    echo '<label for="voter_education_date">Date</label>';
    echo '<input type="date" id="voter_education_date" name="voter_education_date" value="' . esc_attr($date) . '" />';

}

function save_voter_education_meta($post_id)
{
    if (!isset($_POST['voter_education_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['voter_education_meta_box_nonce'], 'save_voter_education_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['voter_education_date'])) {
        update_post_meta($post_id, '_voter_education_date', sanitize_text_field($_POST['voter_education_date']));
    }

    wp_update_post(array(
        'ID' => $post_id,
        'post_content' => wp_kses_post($_POST['carousel_description']), // Allow only safe HTML
    ));
}
add_action('save_post', 'save_voter_education_meta');

// Add custom fields for Video Posts
function add_video_post_meta_box()
{
    add_meta_box('video_post_meta', 'Video Post Details', 'video_post_meta_callback', 'video_posts');
}
add_action('add_meta_boxes', 'add_video_post_meta_box');

function video_post_meta_callback($post)
{
    wp_nonce_field('save_video_post_data', 'video_post_meta_box_nonce');

    $video_url = get_post_meta($post->ID, '_video_post_url', true);
    $description = get_post_field('post_content', $post->ID);



    $comments_count = get_post_meta($post->ID, '_video_post_comments_count', true);


    echo '<label for="carousel_description">Description</label>';
    wp_editor($description, 'carousel_description', array('textarea_name' => 'carousel_description'));


    echo '<label for="video_post_url">Video URL</label>';
    echo '<input type="text" id="video_post_url" name="video_post_url" value="' . esc_attr($video_url) . '" />';


    echo '<label for="video_post_comments_count">Number of Comments</label>';
    echo '<input type="number" id="video_post_comments_count" name="video_post_comments_count" value="' . esc_attr($comments_count) . '" />';
}

function save_video_post_meta($post_id)
{
    if (!isset($_POST['video_post_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['video_post_meta_box_nonce'], 'save_video_post_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['video_post_url'])) {
        update_post_meta($post_id, '_video_post_url', sanitize_text_field($_POST['video_post_url']));
    }

    wp_update_post(array(
        'ID' => $post_id,
        'post_content' => wp_kses_post($_POST['carousel_description']), // Allow only safe HTML
    ));

    if (isset($_POST['video_post_comments_count'])) {
        update_post_meta($post_id, '_video_post_comments_count', intval($_POST['video_post_comments_count']));
    }
}
add_action('save_post', 'save_video_post_meta');

// Add custom fields for Election Stories
function add_election_stories_meta_box()
{
    add_meta_box('election_stories_meta', 'Election Story Details', 'election_stories_meta_callback', 'election_stories');
}
add_action('add_meta_boxes', 'add_election_stories_meta_box');

function election_stories_meta_callback($post)
{
    wp_nonce_field('save_election_story_data', 'election_stories_meta_box_nonce');

    $date = get_post_meta($post->ID, '_election_stories_date', true);
    $description = get_post_field('post_content', $post->ID);
    $comments_count = get_post_meta($post->ID, '_election_stories_comments_count', true);

    echo '<label for="carousel_description">Description</label>';
    wp_editor($description, 'carousel_description', array('textarea_name' => 'carousel_description'));


    echo '<label for="election_stories_date">Date</label>';
    echo '<input type="date" id="election_stories_date" name="election_stories_date" value="' . esc_attr($date) . '" />';

    echo '<label for="election_stories_comments_count">Number of Comments</label>';
    echo '<input type="number" id="election_stories_comments_count" name="election_stories_comments_count" value="' . esc_attr($comments_count) . '" />';
}

function save_election_stories_meta($post_id)
{
    if (!isset($_POST['election_stories_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['election_stories_meta_box_nonce'], 'save_election_story_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['election_stories_date'])) {
        update_post_meta($post_id, '_election_stories_date', sanitize_text_field($_POST['election_stories_date']));
    }

    wp_update_post(array(
        'ID' => $post_id,
        'post_content' => wp_kses_post($_POST['carousel_description']), // Allow only safe HTML
    ));

    if (isset($_POST['election_stories_comments_count'])) {
        update_post_meta($post_id, '_election_stories_comments_count', intval($_POST['election_stories_comments_count']));
    }
}
add_action('save_post', 'save_election_stories_meta');




// Register Carousel Items Custom Post Type
function create_carousel_post_type()
{
    register_post_type('carousel_items', array(
        'labels' => array(
            'name' => __('Carousel Items'),
            'singular_name' => __('Carousel Item')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'), // Add 'thumbnail' to support featured images
        'menu_icon' => 'dashicons-format-gallery', // Icon for the post type
    ));
}
add_action('init', 'create_carousel_post_type');

// Add custom fields for Carousel Items
function add_carousel_meta_box()
{
    add_meta_box('carousel_meta', 'Carousel Item Details', 'carousel_meta_callback', 'carousel_items');
}
add_action('add_meta_boxes', 'add_carousel_meta_box');

function carousel_meta_callback($post)
{
    wp_nonce_field('save_carousel_data', 'carousel_meta_box_nonce');

    // Retrieve the existing value from the editor
    $description = get_post_field('post_content', $post->ID);
    $link = get_post_meta($post->ID, '_carousel_link', true);

    // Display the WordPress editor for the description
    echo '<label for="carousel_description">Description</label>';
    wp_editor($description, 'carousel_description', array('textarea_name' => 'carousel_description'));

    echo '<label for="carousel_link">Link (Optional)</label>';
    echo '<input type="text" id="carousel_link" name="carousel_link" value="' . esc_attr($link) . '" />';
}



function save_carousel_meta($post_id)
{
    if (!isset($_POST['carousel_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['carousel_meta_box_nonce'], 'save_carousel_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the content from the editor
    if (isset($_POST['carousel_description'])) {
        // Update the post content with the editor's value
        wp_update_post(array(
            'ID' => $post_id,
            'post_content' => wp_kses_post($_POST['carousel_description']), // Allow only safe HTML
        ));
    }

    if (isset($_POST['carousel_link'])) {
        update_post_meta($post_id, '_carousel_link', sanitize_text_field($_POST['carousel_link']));
    }
}


add_action('save_post', 'save_carousel_meta');



// Register Presidential Candidates Custom Post Type
function create_presidential_candidates_post_type()
{
    register_post_type('presidential_candidates', array(
        'labels' => array(
            'name' => __('Presidential Candidates'),
            'singular_name' => __('Presidential Candidate')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'), // Add 'thumbnail' to support featured images
        'menu_icon' => 'dashicons-businessman', // Icon for the post type
    ));
}
add_action('init', 'create_presidential_candidates_post_type');

// Add custom fields for Presidential Candidates
function add_presidential_candidates_meta_box()
{
    add_meta_box('presidential_candidates_meta', 'Candidate Details', 'presidential_candidates_meta_callback', 'presidential_candidates');
}
add_action('add_meta_boxes', 'add_presidential_candidates_meta_box');

function presidential_candidates_meta_callback($post)
{
    wp_nonce_field('save_presidential_candidates_data', 'presidential_candidates_meta_box_nonce');

    $candidate_name = get_post_meta($post->ID, '_candidate_name', true);
    $probability = get_post_meta($post->ID, '_probability', true);

    echo '<label for="candidate_name">Candidate Name</label>';
    echo '<input type="text" id="candidate_name" name="candidate_name" value="' . esc_attr($candidate_name) . '" />';

    echo '<label for="probability">Probability (Numeric)</label>';
    echo '<input type="number" id="probability" name="probability" value="' . esc_attr($probability) . '" />';
}

function save_presidential_candidates_meta($post_id)
{
    if (!isset($_POST['presidential_candidates_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['presidential_candidates_meta_box_nonce'], 'save_presidential_candidates_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['candidate_name'])) {
        update_post_meta($post_id, '_candidate_name', sanitize_text_field($_POST['candidate_name']));
    }

    if (isset($_POST['probability'])) {
        update_post_meta($post_id, '_probability', floatval($_POST['probability']));
    }
}
add_action('save_post', 'save_presidential_candidates_meta');
