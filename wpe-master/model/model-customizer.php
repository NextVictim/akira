<?php
/* ----------------------------------------------------

  カスタマイザー

---------------------------------------------------- */
// Customizer Register
if(is_customize_preview()){
  function theme_customizer_register($wp_customize){
    if(file_exists(get_template_directory().'/config/array-customizer.php')){
      require get_template_directory().'/config/array-customizer.php';
      if(is_array(@$array_customize)){wpax_theme_customizer_register($wp_customize,@$array_customize);}
    }
  }
  add_action('customize_register','theme_customizer_register' );
}

// Customizer CSS Setting
function theme_customizer_css(){
  if(file_exists(get_template_directory().'/config/array-customizer.php')){
    require get_template_directory().'/config/array-customizer.php';
    if(is_array(@$array_customize)){
      wpax_theme_customizer_css($array_customize);
      $design_design_css = null;
      $design_design_css = get_option('customizer-design-css');
      if(is_array($design_design_css)){
        echo '<script>jQuery(document).ready(function() {';
        for ($di=0; $di <= 5; $di++) {
          if(!empty($design_design_css['add_class_'.$di.'_selector']) and !empty($design_design_css['add_class_'.$di.'_class'])){
            echo 'jQuery("'.$design_design_css['add_class_'.$di.'_selector'].'").addClass("'.$design_design_css['add_class_'.$di.'_class'].'");';
          }
        }
        echo '});</script>';
      }
    }
  }
}
add_action('wp_head','theme_customizer_css');



class wpaxCustomizer {
  public $const_array;
	public function __construct($const_array = null) {}

  public function setting($wp_customize = null,$array = null,$section_name = null){
    if(!empty($wp_customize) and !empty($section_name) and !empty($array) and is_array($array)){
      if(@$array['input-type'] == 'text' or @$array['input-type'] == 'textarea'){
        $wp_customize->add_setting($section_name.'['.$array['name'].']', array(
          'default'   => @$array['default'],
          'type'      => $array['value-type'],
          'transport' => 'refresh',
        ));
        $wp_customize->add_control($section_name.'['.$array['name'].']', array(
          'settings'  => $section_name.'['.$array['name'].']',
          'label'     => $array['label'],
          'section'   => 'section-'.$section_name,
          'type'      => $array['input-type'],
          'transport' => 'refresh',
          'description' => @$array['description'],
        ));
      }
      elseif(@$array['input-type'] == 'select'){
        $wp_customize->add_setting($section_name.'['.$array['name'].']', array(
          'default'   => @$array['default'],
          'type'      => $array['value-type'],
          'transport' => 'refresh',
        ));
        $wp_customize->add_control($section_name.'['.$array['name'].']', array(
          'settings'  => $section_name.'['.$array['name'].']',
          'label'     => $array['label'],
          'section'   => 'section-'.$section_name,
          'type'      => $array['input-type'],
          'choices' => $array['choices'],
          'transport' => 'refresh',
          'description' => @$array['description'],
        ));
      }
      elseif(@$array['input-type'] == 'radio'){
        $wp_customize->add_setting($section_name.'['.$array['name'].']', array(
          'default'   => @$array['default'],
          'type'      => $array['value-type'],
          'transport' => 'refresh',
        ));
        $wp_customize->add_control($section_name.'['.$array['name'].']', array(
          'settings'  => $section_name.'['.$array['name'].']',
          'label'     => $array['label'],
          'section'   => 'section-'.$section_name,
          'type'      => $array['input-type'],
          'choices' => $array['choices'],
          'transport' => 'refresh',
          'description' => @$array['description'],
        ));
      }
      elseif(@$array['input-type'] == 'color'){
        $wp_customize->add_setting($section_name.'['.$array['name'].']', array(
          'default'   => @$array['default'],
          'type'      => @$array['value-type'],
          'transport' => 'refresh',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control(
        	$wp_customize,$section_name.'['.$array['name'].']',array(
        		'label'      => $array['label'],
        		'section'    => 'section-'.$section_name,
        		'settings'   => $section_name.'['.$array['name'].']',
           'transport' => 'refresh',
           'description' => @$array['description'],
        	)
        ));
      }
      elseif(@$array['input-type'] == 'image'){
        $wp_customize->add_setting($section_name.'['.$array['name'].']', array(
          'default'   => @$array['default'],
          'type'      => $array['value-type'],
          'transport' => 'refresh',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control(
        	$wp_customize,$section_name.'['.$array['name'].']',array(
        		'label' => $array['label'],
        		'section' => 'section-'.$section_name,
        		'settings' => $section_name.'['.$array['name'].']',
           'transport' => 'refresh',
           'description' => @$array['description'],
        	)
        ));
      }
      // Customizer shortcut
      if(!empty($array['cmz-selector'])){
        $wp_customize->selective_refresh->add_partial( $section_name.'['.$array['name'].']', array(
          'selector' => $array['cmz-selector'],
        ));
      }
    }
  }

}

// Action Customizer
function wpax_theme_customizer_register( $wp_customize = null,$array_customize = null ){
  if(is_array(@$array_customize)){
    $class_customizer = new wpaxCustomizer();
    foreach ($array_customize as $panel_name => $panel_array) {
      // Panel
      $wp_customize->add_panel($panel_name,$panel_array);
      // Section
      if(is_array($panel_array['section'])){
        foreach ($panel_array['section'] as $section_name => $section_value) {
          $wp_customize->add_section('section-'.$section_name,array(
            'title' => $section_value['title'],
            'priority' => $section_value['priority'],
            'panel' => $panel_name,
          ));
          // Setting
          if(is_array($section_value['settings'])){
            foreach ($section_value['settings'] as $setting) {
              $class_customizer->setting($wp_customize,$setting,$section_name);
              if(!empty($setting['selector'])){
                $wp_customize->selective_refresh->add_partial($section_name.'['.$setting['name'].']', array(
                  'selector' => $setting['selector'],
                ));
              }
            }
          }
        }
      }
    }
  }
}

function wpax_theme_customizer_register_include( $wp_customize = null,$include = null ){
  if(!empty($include) and file_exists($include)){
    require $include;
    if(is_array(@$array_customize)){
      $class_customizer = new wpaxCustomizer();
      foreach ($array_customize as $panel_name => $panel_array) {
        // Panel
        $wp_customize->add_panel($panel_name,$panel_array);
        // Section
        if(is_array($panel_array['section'])){
          foreach ($panel_array['section'] as $section_name => $section_value) {
            $wp_customize->add_section('section-'.$section_name,array(
              'title' => $section_value['title'],
              'priority' => $section_value['priority'],
              'panel' => $panel_name,
            ));
            // Setting
            if(is_array($section_value['settings'])){
              foreach ($section_value['settings'] as $setting) {
                $class_customizer->setting($wp_customize,$setting,$section_name);
                if(!empty($setting['selector'])){
                  $wp_customize->selective_refresh->add_partial($section_name.'['.$setting['name'].']', array(
                    'selector' => $setting['selector'],
                  ));
                }
              }
            }
          }
        }
      }
    }
  }
}



function wpax_theme_customizer_css($array_customize = null){
  $css_print = null;
  if(is_array(@$array_customize)){
    foreach ($array_customize as $panel_name => $panel_array) {
      if(is_array($panel_array['section'])){
        foreach ($panel_array['section'] as $section_name => $section_value) {
          $this_value = null;
          $this_value = get_option($section_name);
          if(!empty($section_value['settings']) and is_array($section_value['settings'])){
            foreach ($section_value['settings'] as $setting) {
              $val = $setting_name = null;
              $setting_name = $setting['name'];
              if(!empty($setting['css']) and is_array($setting['css'])){
                if(!empty($this_value[$setting_name])){
                  $val = $this_value[$setting_name];
                }
                else{
                  $val = $setting['default'];
                }
                foreach ($setting['css'] as $css_elem => $css_property) {
                  if($css_property == 'box-shadow'){
                    $css_print .= $css_elem.'{box-shadow:'.$val.';-webkit-box-shadow:'.$val.';-moz-box-shadow:'.$val.';}';
                  }
                  elseif($css_property == 'bgc-darken'){
                    $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,1.1).';}';
                  }
                  elseif($css_property == 'bgc-darken-strong'){
                    $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,1.3).';}';
                  }
                  elseif($css_property == 'bgc-lighten'){
                    $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,0.9).';}';
                  }
                  elseif($css_property == 'bgc-lighten-strong'){
                    $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,0.7).';}';
                  }
                  elseif($css_property == 'fc-darken'){
                    $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,1.1).';}';
                  }
                  elseif($css_property == 'fc-darken-strong'){
                    $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,1.3).';}';
                  }
                  elseif($css_property == 'fc-lighten'){
                    $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,0.9).';}';
                  }
                  elseif($css_property == 'fc-lighten-strong'){
                    $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,0.7).';}';
                  }
                  elseif($css_property == 'text-shadow'){
                    $css_print .= $css_elem.'{text-shadow:'.$val.';-webkit-text-shadow:'.$val.';-moz-text-shadow:'.$val.';}';
                  }
                  elseif($css_property == 'background-image'){
                    $css_print .= $css_elem.'{background-image:url(\''.$val.'\');}';
                  }
                  elseif($css_property == 'tags-border'){
                    $css_print .= $css_elem.'{border: 14px solid transparent;border-right: 14px solid '.$val.';}';
                  }
                  elseif($css_property == 'font-family-on'){
                    $css_print .= $css_elem.'{font-family: \''.$val.'\';}';
                  }
                  elseif($css_property == 'mq-bgc'){
                    $css_print .= '@media screen and (max-width:767px){'.$css_elem.'{background-color:'.$val.';}}';
                  }
                  elseif($css_property == 'mq-fc'){
                    $css_print .= '@media screen and (max-width:767px){'.$css_elem.'{color:'.$val.';}}';
                  }
                  else{
                    $css_print .= $css_elem.'{'.$css_property.':'.$val.';}';
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  if(!empty($css_print)){
    echo '<style type="text/css">'.$css_print.'</style>';
  }
}




// Action Customizer CSS
function wpax_theme_customizer_css_include($include = null){
  $css_print = null;
  if(!empty($include) and file_exists($include)){
    require $include;
    if(is_array(@$array_customize)){
      foreach ($array_customize as $panel_name => $panel_array) {
        if(is_array($panel_array['section'])){
          foreach ($panel_array['section'] as $section_name => $section_value) {
            $this_value = null;
            $this_value = get_option($section_name);
            if(!empty($section_value['settings']) and is_array($section_value['settings'])){
              foreach ($section_value['settings'] as $setting) {
                $val = $setting_name = null;
                $setting_name = $setting['name'];
                if(!empty($setting['css']) and is_array($setting['css'])){
                  if(!empty($this_value[$setting_name])){
                    $val = $this_value[$setting_name];
                  }
                  else{
                    $val = $setting['default'];
                  }
                  foreach ($setting['css'] as $css_elem => $css_property) {
                    if($css_property == 'box-shadow'){
                      $css_print .= $css_elem.'{box-shadow:'.$val.';-webkit-box-shadow:'.$val.';-moz-box-shadow:'.$val.';}';
                    }
                    elseif($css_property == 'bgc-darken'){
                      $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,1.1).';}';
                    }
                    elseif($css_property == 'bgc-darken-strong'){
                      $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,1.3).';}';
                    }
                    elseif($css_property == 'bgc-lighten'){
                      $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,0.9).';}';
                    }
                    elseif($css_property == 'bgc-lighten-strong'){
                      $css_print .= $css_elem.'{background-color:'.@wpax_color_code_concentration($val,0.7).';}';
                    }
                    elseif($css_property == 'fc-darken'){
                      $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,1.1).';}';
                    }
                    elseif($css_property == 'fc-darken-strong'){
                      $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,1.3).';}';
                    }
                    elseif($css_property == 'fc-lighten'){
                      $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,0.9).';}';
                    }
                    elseif($css_property == 'fc-lighten-strong'){
                      $css_print .= $css_elem.'{color:'.@wpax_color_code_concentration($val,0.7).';}';
                    }
                    elseif($css_property == 'text-shadow'){
                      $css_print .= $css_elem.'{text-shadow:'.$val.';-webkit-text-shadow:'.$val.';-moz-text-shadow:'.$val.';}';
                    }
                    elseif($css_property == 'border-radius'){
                      $css_print .= $css_elem.'{border-radius:'.$val.';-webkit-border-radius:'.$val.';-moz-border-radius:'.$val.';}';
                    }
                    elseif($css_property == 'background-image'){
                      $css_print .= $css_elem.'{background-image:url(\''.$val.'\');}';
                    }
                    elseif($css_property == 'tags-border'){
                      $css_print .= $css_elem.'{border: 14px solid transparent;border-right: 14px solid '.$val.';}';
                    }
                    elseif($css_property == 'font-family-on'){
                      $css_print .= $css_elem.'{font-family: \''.$val.'\';}';
                    }
                    elseif($css_property == 'mq-bgc'){
                      $css_print .= '@media screen and (max-width:767px){'.$css_elem.'{background-color:'.$val.';}}';
                    }
                    elseif($css_property == 'mq-fc'){
                      $css_print .= '@media screen and (max-width:767px){'.$css_elem.'{color:'.$val.';}}';
                    }
                    else{
                      $css_print .= $css_elem.'{'.$css_property.':'.$val.';}';
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  if(!empty($css_print)){
    echo '<style type="text/css">'.$css_print.'</style>';
  }
}
