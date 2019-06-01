<?php
add_theme_support( 'title-tag' );

// --- Title ---------------------------------------
function wp_document_title_separator( $separator ) {
  $separator = '|';
  return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );

// --- Title Setting ---------------------------------------
function wp_document_title_parts( $title ) {
  if ( is_home() || is_front_page() ) {
    unset( $title['tagline'] );
  } elseif ( is_category() ) {
    $title['title'] = '「' . $title['title'] . '」カテゴリーの記事一覧';
  } elseif ( is_tag() ) {
    $title['title'] = '「' . $title['title'] . '」タグの記事一覧';
  } elseif ( is_archive() ) {
    $title['title'] = $title['title'] . 'の記事一覧';
  }
  elseif ( is_single() ) {
    $title['title'] = get_the_title();
  }
  elseif ( is_page() ) {
    if(is_page('efadmin')){
      $title['title'] = '管理画面';
    }
    else{
      $title['title'] = get_the_title();
    }
  }
  return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );
