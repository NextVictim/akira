<?php
/**
 * CustomPostType関連
 *
 * @copyright 合同会社エッセンス All Rights Reserved
 * @license https://opensource.org/licenses/mit-license.html MIT License
 * @author 稲垣亮 ryo0702@gmail.com
 */

/**
* CustomPostTypeを追加する
*
* @param array $array
*/
function regist_custom_post_type() {
  if(file_exists(get_template_directory()."/config/config-admin-cpt.php")){
    require(get_template_directory()."/config/config-admin-cpt.php");
    foreach ($array_cpt as $cpt_key => $cpt_value) {
      register_post_type( $cpt_key,
        array('label' => $cpt_value['title'],'public' => true,'has_archive' => true,'menu_position' => 5,'supports' => array('title','thumbnail','editor','excerpt'))
      );
    }
  }
}
add_action('init','regist_custom_post_type');
