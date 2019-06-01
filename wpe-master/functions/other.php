<?php
function ex_man($num = null){
  $return = null;
  if(!empty($num)){
    $return = $num * 0.001;
  }
  return $return;
}


function url_param_change($par=Array(),$op=0){
  $url = parse_url($_SERVER["REQUEST_URI"]);
  if(isset($url["query"])) parse_str($url["query"],$query);
  else $query = Array();
  foreach($par as $key => $value){
      if($key && is_null($value)) unset($query[$key]);
      else $query[$key] = $value;
  }
  $query = str_replace("=&", "&", http_build_query($query));
  $query = preg_replace("/=$/", "", $query);
  return $query ? (!$op ? "?" : "").htmlspecialchars($query, ENT_QUOTES) : "";
}

function query_pagination($uqery = null,$now_page = null){
  $pagination = null;
  $allpage_num = $uqery->max_num_pages;

  $now_m1 = $now_page - 1;
  $now_m2 = $now_page - 2;
  $now_p1 = $now_page + 1;
  $now_p2 = $now_page + 2;

  if(@$_GET['pager'] != 1 and @$_GET['pager'] != 0){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => 1));
    $pagination .= '<a href="'.$thisurl.'"><i class="fas fa-backward"></i></a>';
  }
  if($now_m2 > 0){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => $now_m2));
    $pagination .= '<a href="'.$thisurl.'">'.$now_m2.'</a>';
  }
  if($now_m1 > 0){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => $now_m1));
    $pagination .= '<a href="'.$thisurl.'">'.$now_m1.'</a>';
  }
  if($allpage_num >= 1){
    $pagination .= '<span>'.$now_page.'</span>';
  }
  if($now_p1 <= $allpage_num){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => $now_p1));
    $pagination .= '<a href="'.$thisurl.'">'.$now_p1.'</a>';
  }
  if($now_p2 <= $allpage_num){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => $now_p2));
    $pagination .= '<a href="'.$thisurl.'">'.$now_p2.'</a>';
  }
  if(@$_GET['pager'] != $allpage_num and $allpage_num != 1){
    $thisurl = null;
    $thisurl = url_param_change(array('pager' => $allpage_num));
    $pagination .= '<a href="'.$thisurl.'"><i class="fas fa-forward"></i></a>';
  }
  if(!empty($pagination)){echo '<div class="pagination">'.$pagination.'</div>';}
}


function excerpt_max_charlength($charlength) {
  $return = $excerpt_words = null;
  $excerpt = get_the_excerpt();
  $excerpt = str_replace('[&hellip;]', '...', $excerpt);
	$excerpt_words = mb_strlen( $excerpt );

	if($excerpt_words < $charlength or empty($excerpt_words)){
    $return = $excerpt;
  }
  else{
    $excerpt = mb_strimwidth( $excerpt, 0, $charlength, "...", "UTF-8" );
    $return = $excerpt;
  }
  return $return;
}
