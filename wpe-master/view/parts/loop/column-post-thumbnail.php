<?php
$thumbnail = $thumbnail_uri = $thumbnail_uri_id = null;
if ( has_post_thumbnail() ) {
  $thumbnail_uri_id = get_post_thumbnail_id(get_the_ID());
  $thumbnail_uri = wp_get_attachment_image_src( $thumbnail_uri_id, 'full' );
  $thumbnail = '<div class="thumbnail" style="background-image:url(\''.$thumbnail_uri[0].'\');"></div>';
}
else{
  $thumbnail = '<div class="thumbnail" style="background-image:url(\''.$nothumbnail.'\');"></div>';
}

echo '<li>
  <a href="'.get_the_permalink().'">
  <article>
    <div class="text">
      <h2>'.get_the_title().'</h2>
      <p class="date">
        <span class="timestamp">'.get_the_time('Y-m-d').'</span><span class="slash"> / </span><span class="authorname">'.get_the_author().'</span>
      </p>
    </div>
    '.$thumbnail.'
  </article>
  </a>
</li>';
