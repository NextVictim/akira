<?php
/**
* [wp-config-example] カスタマイザー設定ファイル
*
* カスタマイザーのフォームを設定するファイル。
* configフォルダに設置するだけで、カスタマイザーが利用可能。
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author Ryo Inagaki
*/

$array_customize = null;
$array_cmz_common_navbar = array(
  'title' => 'ナビゲーションバー',
  'priority' => 50,
  'settings' => array(
    'common-navbar-logo' => array(
      'name' => 'common-navbar-logo',
      'input-type' => 'image',
      'value-type' => 'option',
      'label' => 'ロゴ',
    ),
  ),
);

$array_cmz = array(
  'cmz-common' => @$array_cmz_common_navbar,
);

// Wrap
$array_customize = array(
  'cmz-design' => array(
    'title' => '共通設定',
    'priority' => 80,
    'capability' => 'edit_theme_options',
    'section' => $array_cmz
  ),
);
