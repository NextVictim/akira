<?php
// Config
$page = array(
  'title' => 'CODING ESSENCE Archives',
  'description' => 'コーディングエッセンスの作業を効率化するためのスニペットをまとめています。',
  'path' => ''
);
// View
require @$page['path']."parts/head.php";
?>
<header>
  <h1>CODING ESSENCE Archivesについて</h1>
  <p>コーディングを効率化するための社内アーカイブ</p>
</header>
<section class="text">
  <h2>コーディングを効率化するための指標</h2>
  <p>
    CODING ESSENCE Archivesは効率的にコーディングするための指標となるスニペット集です。<br />
    Archivesの利用は、社内に限定して下さい。
  </p>
</section>
<?php
require @$page['path']."parts/foot.php";
