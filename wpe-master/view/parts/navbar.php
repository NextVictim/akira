<header class="navbar navbar-underline-shadow">
  <div class="container contents">
    <h1 class="logo">
      <?php
      if(!empty($array_common['common-navbar-logo'])){
        echo '<span class="logo-img"><a href="'.site_url().'"><img src="'.$array_common['common-navbar-logo'].'" title="'.get_bloginfo('name').'" /></a></span>';
      }
      else{
        echo '<span class="logo-text"><a href="'.site_url().'">'.get_bloginfo('name').'</a></span>';
      }
      ?>
      <div class="navbar-spmenu-left"></div>
      <div class="navbar-spmenu-right">
        <div class="drawr-button">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
        </div>
      </div>
    </h1>
    <?php
    $defaults = array(
    	'menu'            => 'navbar',
    	'menu_class'      => '',
    	'container'       => 'div',
    	'container_class' => 'menu',
    	'depth'           => 1,
      'theme_location' => 'navbar',
    	'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
    );
    wp_nav_menu( $defaults );
    ?>
  </div>
</header>
<script type="text/javascript">
jQuery(document).ready(function() {
  var switch_navbar_drawr = 'off';
  jQuery(document).on("click",'.navbar .drawr-button',function(){
    if(switch_navbar_drawr == 'off'){
      jQuery(".navbar .menu").slideDown(100);
      switch_navbar_drawr = 'on';
    }
    else{
      jQuery(".navbar .menu").slideUp(100);
      switch_navbar_drawr = 'off';
    }
  });
});
</script>
