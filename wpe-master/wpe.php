<?php
/**
* WPE
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author 稲垣亮 ryo0702@gmail.com
* @version 0.0.9
*/

/**
* ベーシック設定
*/
require get_template_directory()."/wpe/config.php";

/**
* 関数
*/
require get_template_directory()."/wpe/functions/post.php";
require get_template_directory()."/wpe/functions/title.php";
require get_template_directory()."/wpe/functions/loop.php";
require get_template_directory()."/wpe/functions/cpt.php";
require get_template_directory()."/wpe/functions/sitesetup.php";
require get_template_directory()."/wpe/functions/other.php";

/**
* モデル
*/
require get_template_directory()."/wpe/model/model-wpadmin-cf.php";
require get_template_directory()."/wpe/model/model-wpadmin-form.php";
require get_template_directory()."/wpe/model/model-customizer.php";
