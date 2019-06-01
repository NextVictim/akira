<?php
function config_admin_script(){
  if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('admin-style',get_template_directory_uri().'/admin.css');
    wp_enqueue_script('admin-scripts',get_template_directory_uri().'/scripts/admin.js', false, true );
  } else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('admin-style',get_template_directory_uri().'/admin.css');
    wp_enqueue_script('admin-scripts',get_template_directory_uri().'/scripts/admin.js', false, true );
  }
}
add_action('admin_enqueue_scripts','config_admin_script');

/**
* テーマサポート
*/
function theme_basic_support_config(){
  add_filter( 'show_admin_bar', '__return_false' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 480, 320 );
  add_image_size('square',320,320,true);
  add_image_size('horizontal',320,480,true);
  register_nav_menus( array(
	   'navbar' => 'ナビゲーションバー',
  ));
}
add_action('after_setup_theme','theme_basic_support_config' );
