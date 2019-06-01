<?php
/**
* postにカスタムフィールドを追加
*/
function regist_cff_post() {
  new wpaxRegistCFForm(array(
    'box_title' => '画像設定',
    'box_name' => 'post_box',
    'post_type' => array('post'),
    'load_array_path' => get_template_directory().'/config/array-cpt-cf-post.php',
  ));
}
if (is_admin()) {
  add_action( 'load-post.php', 'regist_cff_post' );
  add_action( 'load-post-new.php', 'regist_cff_post' );
}

/**
* テーマのCSS＆Javascript
*/
function config_theme_script() {
  // Js
  wp_enqueue_script('jquery');
  wp_enqueue_script('js-modaal',get_template_directory_uri().'/scripts/modaal/js/modaal.min.js',array('jquery'));
  wp_enqueue_script('js-swiper',get_template_directory_uri().'/scripts/swiper/js/swiper.min.js',array('jquery'));
  wp_enqueue_script('js-functions-thumbnail',get_template_directory_uri().'/ce/scripts/functions-thumbnail.js',array('jquery'));
  wp_enqueue_script('js-action',get_template_directory_uri().'/scripts/action.js',array('js-functions-thumbnail'));
  // CSS
  wp_enqueue_style('css-modaal',get_template_directory_uri().'/scripts/modaal/css/modaal.min.css');
  wp_enqueue_style('css-swiper',get_template_directory_uri().'/scripts/swiper/css/swiper.min.css');
  wp_enqueue_style('css-theme',get_template_directory_uri().'/style.css');
}
add_action( 'wp_enqueue_scripts', 'config_theme_script' );
