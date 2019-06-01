<?php
// Config
$page = array(
  'title' => 'Button',
  'description' => '様々な種類のボタンを表示させます',
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
  <h2>.button</h2>
  <p>
    .buttonでbutton要素を初期化し、デフォルトのボタン要素を表示させます。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button">a.button</a>
    </div>
    <div class="tac">
      <button type="button" class="button">button.button</button>
    </div>
  </div>
  <div class="comment">デフォルト時ではサイドバーが右に入ります。</div>
</section>

<section class="example">
  <h3>.button.button-color</h3>
  <div class="view">
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-default">.button.button-default</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-primary">.button.button-primary</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-success">.button.button-success</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-info">.button.button-info</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-warning">.button.button-warning</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-danger">.button.button-danger</a>
    </div>
  </div>
</section>

<section class="example">
  <h3>.button.button-size</h3>
  <div class="view">
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-m">.button.button-m</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-s">.button.button-s</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-xs">.button.button-xs</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-l">.button.button-l</a>
    </div>
    <div class="tac" style="margin-bottom:10px;">
      <a href="#" class="button button-xl">.button.button-xl</a>
    </div>
  </div>
  <div class="comment">デフォルト時ではサイドバーが右に入ります。</div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
