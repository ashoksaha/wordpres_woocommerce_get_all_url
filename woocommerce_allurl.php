<?php
include "wp-load.php";
 
$posts = new WP_Query('post_type=any&posts_per_page=-1&post_status=publish');
$posts = $posts->posts;
 
header('Content-type:text/plain');
foreach($posts as $post) {
    switch ($post->post_type) {
        case 'revision':
        case 'nav_menu_item':
            break;
        case 'page':
            $permalink = get_page_link($post->ID);
            break;
        case 'post':
            $permalink = get_permalink($post->ID);
            break;
        case 'attachment':
            $permalink = get_attachment_link($post->ID);
            break;
        default:
            $permalink = get_post_permalink($post->ID);
            break;
    }
    echo "\n{$permalink}";
  //echo "\n{$post->post_type}\t{$permalink}\t{$post->post_title}";
}
?>
 