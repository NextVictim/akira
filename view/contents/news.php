<main class="mm-contents mm-contents-news on-navbar-bottom">
  <div class="container">
    <?php
    $args = array(
    	'post_type' => 'post',
      'posts_per_page' => 0,
      'post_status' => 'publish',
    );
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
        ?>
        <article>
          <header>
            <?php
            echo '<h2>'.get_the_title().'</h2>';
            echo '<p class="date">'.date('F d Y', strtotime(get_the_time('Ymd'))).'</p>';
            ?>
          </header>
          <section class="content">
            <?php the_content(); ?>
          </section>
          <?php
          if(!empty(get_post_meta(get_the_ID(), 'image1', true))){
            echo '<section class="photo"><img src="'.get_post_meta(get_the_ID(), 'image1', true).'" alt="'.get_the_title().'" class="modaal-inline-'.get_the_ID().'" /></section>';
            ?>
            <?php
          }
          ?>
        </article>
        <?php
    	}
    }
    ?>
  </div>
</main>
