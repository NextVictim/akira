<?php
// Config
$page = array(
  'title' => 'Container',
  'description' => '要素をセンタリングするコンテナについて',
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
  <h2>.container</h2>
  <p>
    .containerを使用して、要素をセンタリングすることができるようになります。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="container" style="background-color:#e2e2e2;">.container</div>
  </div>
  <div class="comment">標準のコンテナサイズ。Stylusでは変数があてられており、コンテナ幅は指定が可能。</div>
</section>
<section class="example">
  <h3>.container-s</h3>
  <div class="view">
    <div class="container-s" style="background-color:#e2e2e2;">.container-s</div>
  </div>
  <div class="comment">小さいコンテナサイズ。</div>
</section>
<section class="example">
  <h3>.container-xs</h3>
  <div class="view">
    <div class="container-xs" style="background-color:#e2e2e2;">.container-xs</div>
  </div>
  <div class="comment">極小コンテナサイズ。</div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
