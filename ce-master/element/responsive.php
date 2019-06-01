<?php
// Config
$page = array(
  'title' => 'Responsive',
  'description' => '画面の大きさで表示非表示をさせます',
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
  <h2>.resp-sp-noview等</h2>
  <p>
    指定の幅で非表示にします。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="resp-sp-noview" style="margin-bottom:10px;">
      .resp-sp-noview
    </div>
  </div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
