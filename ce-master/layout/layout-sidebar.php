<?php
// Config
$page = array(
  'title' => 'Layout Sidebar',
  'description' => 'サイドバーが入るレイアウトパターン',
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
  <h2>.layouts</h2>
  <p>
    .layoutsは左右のどちらかにサイドバーを入れる時に使うレイアウトパターンです。デフォルトの場合、サイドバーは20%、コンテンツは80%です。<br />SPサイズの場合、下部に移動します。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="container layouts" style="background-color:#f7f7f7;">
      <div class="layout-contents" style="border:#e8e8e8 solid 1px;">
        .layout-contents
      </div>
      <div class="layout-sidebar" style="border:#e8e8e8 solid 1px;">
        .layout-sidebar
      </div>
    </div>
  </div>
  <div class="comment">デフォルト時ではサイドバーが右に入ります。</div>
</section>

<section class="example">
  <h3>.layouts.sidebar-left</h3>
  <div class="view">
    <div class="container layouts sidebar-left" style="background-color:#f7f7f7;">
      <div class="layout-contents" style="border:#e8e8e8 solid 1px;">
        .layout-contents
      </div>
      <div class="layout-sidebar" style="border:#e8e8e8 solid 1px;">
        .layout-sidebar
      </div>
    </div>
  </div>
  <div class="comment">.sidebar-leftを追加することで、サイドバーが左に入ります。</div>
</section>

<section class="example">
  <h3>.layouts.sidebar-right</h3>
  <div class="view">
    <div class="container layouts sidebar-right" style="background-color:#f7f7f7;">
      <div class="layout-contents" style="border:#e8e8e8 solid 1px;">
        .layout-contents
      </div>
      <div class="layout-sidebar" style="border:#e8e8e8 solid 1px;">
        .layout-sidebar
      </div>
    </div>
  </div>
  <div class="comment">.sidebar-leftを追加することで、サイドバーが右に入ります。</div>
</section>

<section class="example">
  <h3>.layouts.sidebar-sp-noview</h3>
  <div class="view">
    <div class="container layouts sidebar-sp-noview" style="background-color:#f7f7f7;">
      <div class="layout-contents" style="border:#e8e8e8 solid 1px;">
        .layout-contents
      </div>
      <div class="layout-sidebar" style="border:#e8e8e8 solid 1px;">
        .layout-sidebar
      </div>
    </div>
  </div>
  <div class="comment">.sidebar-sp-noviewを追加することで、SPサイズだとサイドバーは表示されません。</div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
