<?php
// Config
$page = array(
  'title' => 'Navbar',
  'description' => 'ナビゲーションバーを表示させます',
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
  <h2>.navbar</h2>
  <p>
    .navbarを表示させます
  </p>
</section>
<section class="example">
  <div class="view">
    <header class="navbar" style="border:solid 1px #dfdfdf;">
      <ul class="contents container">
        <li class="logo"><h1 class="logo-text"><a href="#">LOGO</a></h1></li>
        <li class="menu">
          <ul>
            <li><a href="#">メニュー①</a></li>
            <li><a href="#">メニュー②</a></li>
            <li><a href="#">メニュー③</a></li>
            <li><a href="#">メニュー④</a></li>
            <li><a href="#">メニュー⑤</a></li>
          </ul>
        </li>
      </ul>
    </header>
  </div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
