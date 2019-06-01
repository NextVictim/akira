<?php
// Config
$page = array(
  'title' => 'Grid',
  'description' => 'グリッド分割をしてレイアウトを組みます',
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
  <h2>.grids</h2>
  <p>
    必ずグリッド要素を.gridsで囲みます。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="container">
      <div class="grids" style="background-color:#939393;padding:10px;">
        <div class="grid2" style="background-color:#e7e7e7;">.grid2</div>
        <div class="grid1" style="background-color:#e7e7e7;">.grid1</div>
        <div class="grid3" style="background-color:#e7e7e7;">.grid3</div>
        <div class="grid1" style="background-color:#e7e7e7;">.grid1</div>
        <div class="grid5" style="background-color:#e7e7e7;">.grid5</div>
      </div>
    </div>
  </div>
  <div class="comment">最大12個のグリッドが入ります</div>
</section>
<section class="text">
  <h2>.grids-sp-mb-10 ~ 30</h2>
  <p>
    .gridsにgrids-sp-mb-10 ~ 30を追加すると、sp時に下余白が空きます。
  </p>
</section>
<section class="example">
  <div class="view">
    <div class="container">
      <div class="grids grids-sp-mb-10" style="background-color:#939393;padding:10px;">
        <div class="grid2" style="background-color:#e7e7e7;">.grid2</div>
        <div class="grid1" style="background-color:#e7e7e7;">.grid1</div>
        <div class="grid3" style="background-color:#e7e7e7;">.grid3</div>
        <div class="grid1" style="background-color:#e7e7e7;">.grid1</div>
        <div class="grid5" style="background-color:#e7e7e7;">.grid5</div>
      </div>
    </div>
  </div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
