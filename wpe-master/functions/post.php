<?php
/**
* WPのpostに関する関数
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author 稲垣亮 ryo0702@gmail.com
*/

function is_exist_postname($postname = null){
  if(!empty($postname)){
    $args = array(
    	'name' => $postname,
      'post_type' => 'any',
    );
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
      return true;
    }
    else{
      return false;
    }
    wp_reset_postdata();
  }
  else{
    return false;
  }
}
