<main class="mm-contents mm-contents-collection on-navbar-bottom">
  <div class="container">
    <?php
    $array_collection_movie = null;
    $array_collection_movie = array(
      array(
        'title' => 'LEVI\'S',
        'dirname' => 'levis',
        'photomaxnum' => '10',
        'movie' => true,
      ),
      array(
        'title' => 'LEVI\'S',
        'dirname' => 'levis',
        'photomaxnum' => '10',
        'movie' => true,
      )
    );
    ?>
    <ul class="movies">
      <?php
      foreach ($array_collection_movie as $value) {
        echo '<li class="'.$value['dirname'].'">'.$value['title'].'</li>';
      }
      ?>
    </ul>
    <?php
    $array_collection_photo = null;
    $array_collection_photo = array(
      array(
        'title' => 'LEVI\'S',
        'dirname' => 'levis',
        'photomaxnum' => '10',
      ),
      array(
        'title' => 'LEVI\'S',
        'dirname' => 'levis',
        'photomaxnum' => '10',
      ),
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
    );
    ?>
    <ul class="photos">
      <?php
      foreach ($array_collection_photo as $value) {
        echo '<li class="'.$value['dirname'].'">'.$value['title'].'</li>';
      }
      ?>
    </ul>
  </div>
</main>
