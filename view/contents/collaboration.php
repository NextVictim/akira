<main class="mm-contents mm-contents-collaboration on-navbar-bottom">
  <div class="container">
    <?php
    $array_collaboration = null;
    $array_collaboration = array(
      '2019' => array(
        array(
          'title' => 'LEVI\'S',
          'dirname' => 'levis',
          'photomaxnum' => '10',
        ),
        array(
          'title' => 'LEVI\'S',
          'dirname' => 'levis',
          'photomaxnum' => '10',
        )
      )
    );
    ?>
    <ul class="collaboration">
      <?php
      foreach ($array_collaboration as $key => $value) {
        echo '<li data-year="'.$key.'">'.$key.'</li>';
      }
      ?>
    </ul>
  </div>
</main>
