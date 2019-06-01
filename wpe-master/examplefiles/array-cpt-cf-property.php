<?php
/**
* [wp-config-example] 物件 カスタムフィールド 設定ファイル
*
* カスタムフィールドの設定ファイル。
* 通常テーマディレクトリ内の「config」に配置し、カスタム投稿タイプを設定すると使用可能。
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author Ryo Inagaki
*/

$array_forms = array(
  array('type' => 'title','title' => '物件概要'),
  array('type' => 'wrap','column' => 2,'inner-form' => array(
    array('key' => 'property-area','type' => 'text','value-type' => 'cf','post-id' => @$post_id,'title' => '平米数','unit' => '㎡'),
    array('key' => 'property-type','type' => 'select','value-type' => 'cf','post-id' => @$post_id,'title' => '物件種類','option' => array(
      'マンション' => 'マンション','アパート' => 'アパート','戸建て' => '戸建て'
    )),
    array('key' => 'property-type','type' => 'select','value-type' => 'cf','post-id' => @$post_id,'title' => '物件間取り','option' => array(
      '1R' => '1R','1K' => '1K','1DK' => '1DK','2K' => '2K','2DK' => '2DK','2LDK' => '2LDK'
    )),
  )),
  array('type' => 'hr'),
  array('type' => 'title','title' => 'その他'),
  array('key' => 'property-other-comment','type' => 'textarea','value-type' => 'cf','post-id' => @$post_id,'title' => '備考'),
);
