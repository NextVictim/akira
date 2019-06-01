<?php
// Config
$page = array(
  'title' => 'Text',
  'description' => '文字の大きさなどのテキストに関する装飾など',
  'path' => '../'
);

// View
require $page['path']."parts/head.php";
?>

<header>
  <h1><?php echo @$page['title']; ?></h1>
  <p><?php echo @$page['description']; ?></p>
</header>
<section class="text">
  <h2>テキストのレイアウト</h2>
  <p>
    センター寄せ、左寄せ、右寄せなどのテキストのレイアウトを設定します。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="tac" style="margin-bottom:10px;">
      センター寄せ
    </div>
    <div class="tar" style="margin-bottom:10px;">
      右寄せ
    </div>
    <div class="tal" style="margin-bottom:10px;">
      左寄せ
    </div>
  </div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
