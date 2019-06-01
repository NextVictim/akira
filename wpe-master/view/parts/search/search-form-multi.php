<?php
/**
* [parts] search-form-multi
*
* 複合検索フォームの表示を行います。
*
* @copyright 合同会社エッセンス All Rights Reserved
* @license https://opensource.org/licenses/mit-license.html MIT License
* @author Ryo Inagaki
*/
if(is_array($relation_array_search_form_multi)){
?>
<div class="search-form-multi">
	<form action="<?php site_url('/?s='); ?>" method="post" enctype="multipart/form-data">
  <?php
  if(is_array(@$relation_array_search_form_multi['options'])){
    foreach ($relation_array_search_form_multi['options'] as $options) {
      if(!empty(@$options['title'])){echo '<h3>'.$options['title'].'</h3>';}
      if(is_array(@$options['option'])){
        echo '<ul>';
        foreach ($options['option'] as $option) {
          echo '<li>';
          if(!empty(@$option['title'])){echo '<label>'.$option['title'].'</label>';}
          echo '</li>';
        }
        echo '</ul>';
      }
    }
  }
  ?>
	<div class="search-options">
    <h3></h3>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<button type="submit" name="submit" value="search">送信</button>
	</form>
</div>
<?php } ?>
