<?php
/**
 * WPのサイトセットアップ関数
 *
 * @copyright 合同会社エッセンス All Rights Reserved
 * @license https://opensource.org/licenses/mit-license.html MIT License
 * @author 稲垣亮 ryo0702@gmail.com
 */

function sitesetup($array = null){
  if(is_array(@$array)){
    if(is_array(@$array['page'])){
      foreach (@$array['page'] as $page_name => $page_value) {
        if(!empty($page_name) and !is_exist_postname($page_name)){
          $my_post = array(
            'post_title'    => @$page_value['title'],
            'post_status'   => 'publish',
            'post_name' => $page_name,
            'post_type' => 'page'
          );
          wp_insert_post( $my_post );
        }
      }
    }
  }
}
