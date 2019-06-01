<?php
/**
* [wp-config-example] カスタム投稿タイプ別フォーム登録設定ファイル
*
* カスタム投稿タイプ別のフォームを設定するファイル。
* 通常テーマディレクトリ内の「config」に配置し、functionsから読み込みすると使用可能。
* フォームの設定は「array-cpt-cf-xxx」を設定する必要あり。
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author Ryo Inagaki
*/

function regist_cff_property() {
 new wpaxRegistCFForm(array(
   'box_title' => '物件',
   'box_name' => 'property_box',
   'post_type' => array('property'),
   'load_array_path' => get_template_directory().'/config/array-cpt-cf-property.php',
 ));
}
if (is_admin()) {
 add_action( 'load-post.php', 'regist_cff_property' );
 add_action( 'load-post-new.php', 'regist_cff_property' );
}
