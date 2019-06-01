<?php
/* ----------------------------------------------------

  CPTの登録を行います

---------------------------------------------------- */

class wpaxForm {

  public $const_array;
	public function __construct($const_array = null) {}

  public function form($array = null,$other = null){
    $return = $value = $title = $unit = null;
    if(!empty($array) and is_array($array) and !empty($array['type']) and $array['type'] == 'wrap' and !empty($array['inner-form'])){
      $insert_id = $insert_class = null;
      if(!empty(@$array['id'])){
        $insert_id = ' id="'.$array['id'].'"';
      }
      if(!empty(@$array['class'])){
        $insert_class = ' '.$array['class'];
      }
      $return .= '<div'.$insert_id.' class="forms column-'.@$array['column'].$insert_class.'">';
      foreach ($array['inner-form'] as $children_form) {
        $children_wide = null;
        if(!empty($children_form['children-style']) and $children_form['children-style'] == 'wide'){$children_wide = ' wide';}
        $return .= '<div class="input-children'.$children_wide.'">'.$this->form($children_form,$other).'</div>';
      }
      for ($i=1; $i < @$array['column']; $i++) {
        $return .= '<div class="input-children blank"></div>';
      }
      $return .= '</div>';
    }
    else{
      // Inputs
      if(!empty($array) and is_array($array) and !empty($array['key']) and !empty($array['type'])){
        // Value
        if(!empty($array['value'])){$value = esc_html($array['value']);}
        if(!empty($array['unit'])){$unit = '<span class="unit">'.esc_html($array['unit']).'</span>';}
        if(!empty($array['value-type'])){
          if($array['value-type'] == 'cf' and !empty($array['post-id'])){
            if($array['type'] == 'checkbox-multi'){
              $value = get_post_meta( $array['post-id'], $array['key'], true );
            }
            else{
              $value = esc_html(get_post_meta( $array['post-id'], $array['key'], true ));
            }
          }
          if($array['value-type'] == 'user' and !empty($array['user-id'])){
            if($array['type'] == 'checkbox-multi'){
              $value = get_user_meta( $array['user-id'], $array['key'], true );
            }
            else{
              $value = esc_html(get_user_meta( $array['user-id'], $array['key'], true ));
            }
          }
          elseif($array['value-type'] == 'option'){
            if($array['type'] == 'checkbox-multi'){
              $value = get_option($array['key']);
            }
            else{
              $value = esc_html(get_option($array['key']));
            }
          }
        }
        // Form
        if($array['type'] == 'textarea'){
          $return = '<div class="input textarea"><textarea id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'">'.$value.'</textarea></div>';
        }
        elseif($array['type'] == 'textarea-large'){
          $return = '<div class="input textarea"><textarea id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" style="height:300px;">'.$value.'</textarea></div>';
        }
        elseif($array['type'] == 'text'){
          $return = '<div class="input text"><input type="text" id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" value="'.$value.'">'.$unit.'</div>';
        }
        elseif($array['type'] == 'number'){
          $return = '<div class="input number"><input type="number" id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" value="'.$value.'">'.$unit.'</div>';
        }
        elseif($array['type'] == 'password'){
          $return = '<div class="input password"><input type="password" id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" value="'.$value.'">'.$unit.'</div>';
        }
        elseif($array['type'] == 'checkbox'){
          $checked = null;
          if(!empty($value)){
            $checked = ' checked';
          }
          $return = '<input type="checkbox" id="'.@$array['key'].'" name="'.@$array['key'].'" value="on"'.$checked.'>';
        }
        elseif($array['type'] == 'radio-single'){
          $checked = null;
          if(!empty($value) and $value == @$array['key']){
            $checked = ' checked';
          }
          $return = '<input type="radio" id="'.@$array['key'].'" name="'.@$array['key'].'" value="'.@$array['value'].'"'.$checked.'>';
        }
        elseif($array['type'] == 'url'){
          $return = '<div class="input url"><input type="url" id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" value="'.$value.'"></div>';
        }
        elseif($array['type'] == 'email'){
          $return = '<div class="input email"><input type="email" id="'.@$array['key'].'" name="'.@$array['key'].'" placeholder="'.@$array['title'].'" value="'.$value.'"></div>';
        }
        elseif($array['type'] == 'image'){
          $image = $rand = null;
          $rand = rand(10,20);
          if(!empty($value)){
            $image = '<div class="upload_image_peview"><img src="'.$value.'" style="width:100%;height:auto;"></div>';
          }
          else{
            $image = '<div class="upload_image_peview"><img src="" style="width:100%;height:auto;"></div>';
          }
          $return = '<div class="image">
            '.$image.'
            <input class="widefat" type="text" name="'.@$array['key'].'" id="'.@$array['key'].'" value="'.$value.'">
            <a href="javascript: void(0);" onclick="upload(\'.image_upload_'.$rand.'\')" class="image_upload_'.$rand.' button button-secondary" style="margin-top:3px;">画像を設定</a>
            <script type="text/javascript">


              function upload(e){
                var thiselem = jQuery(e);
                  var attachment = "";
                  var parent_wrap = jQuery(thiselem).parent(".image");
                  var custom_uploader = wp.media({
                      title: \'画像を設定\',
                      button: {
                          text: \'画像を選択\'
                      },
                      multiple: false
                  })
                  .on(\'select\', function() {
                      attachment = custom_uploader.state().get(\'selection\').first().toJSON();
                      jQuery(parent_wrap).find(".upload_image_peview").html("<img src=\'"+attachment.url+"\' style=\'width:100%;height:auto;\'>");
                      jQuery(parent_wrap).find("input.widefat").val(attachment.url);
                  })
                  .open();
              };

          </script>

          </div>';
        }
        elseif($array['type'] == 'select' and !empty($array['option']) and is_array($array['option'])){
          $options = null;
          foreach ($array['option'] as $opt_name => $opt_title) {
            $opt_select = null;
            if($opt_name == $value){$opt_select = ' selected';}
            $options .= '<option value="'.$opt_name.'"'.$opt_select.'>'.$opt_title.'</option>';
          }
          $return = '<div class="input selected">
            <select name="'.@$array['key'].'" id="'.@$array['key'].'"><option value="">'.@$array['title'].'を選択</option>'.$options.'</select>
          </div>';
        }
        elseif($array['type'] == 'groupselect' and !empty($array['option']) and is_array($array['option'])){
          $options = null;
          foreach ($array['option'] as $opt_grouptitle => $opt_value) {
            if(is_array($opt_value)){
              $options .= '<optgroup label="'.$opt_grouptitle.'"></optgroup>';
              foreach ($opt_value as $opt_name => $opt_title) {
                $opt_select = null;
                if($opt_name == $value){$opt_select = ' selected';}
                $options .= '<option value="'.$opt_name.'"'.$opt_select.'>'.$opt_title.'</option>';
              }
            }
          }
          $return = '<div class="input selected">
            <select name="'.@$array['key'].'" id="'.@$array['key'].'"><option value="">'.@$array['title'].'を選択</option>'.$options.'</select>
          </div>';
        }
        elseif($array['type'] == 'checkbox-multi' and !empty($array['option']) and is_array($array['option'])){
          $options = null;
          foreach ($array['option'] as $opt_name => $opt_title) {
            $opt_select = null;
            if (is_array(@$value) and in_array($opt_name, @$value)) {$opt_select = ' checked';}
            $options .= '<label style="margin-bottom:10px;display:inline-block;margin-right:10px;width:20%;"><input type="checkbox" name="'.@$array['key'].'[]" id="'.@$array['key'].'" value="'.$opt_name.'"'.$opt_select.'> '.$opt_title.'</label>';
          }
          $return = '<div class="input selected">
            '.$options.'
          </div>';
        }
      }

      // Wrap
      $class = null;
      if(!empty($return) and $array['type'] == 'checkbox'){
        if(!empty(@$array['class'])){$class = ' '.$array['class'];}
        if(!empty(@$array['title'])){$title = '<label class="label-checkbox" for="'.@$array['key'].'">'.@$array['title'].'</label>';}
        $return = '<div class="inputs'.$class.'">'.$return.$title.'</div>';
      }
      elseif(!empty($return) and $array['type'] == 'radio-single'){
        if(!empty(@$array['class'])){$class = ' '.$array['class'];}
        if(!empty(@$array['title'])){$title = '<span class="label-radio-single">'.@$array['title'].'</span>';}
        $return = '<label class="inputs'.$class.'" style="display:block;margin-bottom:10px;">'.$return.$title.'</label>';
      }
      elseif(!empty($return)){
        if(!empty($array['description'])){
          $return = $return.'<p style="font-size:10px;padding:0;margin:3px 0 0 0;color:#aaaaaa;">'.$array['description'].'</p>';
        }
        if(!empty(@$array['class'])){$class = ' '.$array['class'];}
        if(!empty(@$array['title'])){$title = '<label for="'.@$array['key'].'">'.@$array['title'].'</label>';}
        $return = '<div class="inputs'.$class.'">'.@$title.$return.'</div>';
      }
      elseif(@$array['type'] == 'hr'){
        $return = '<hr class="inputs-hr" />';
      }
      elseif(@$array['type'] == 'title' and !empty($array['title'])){
        $return = '<div class="inputs-title">'.@$array['title'].'</div>';
      }
      elseif($array['type'] == 'map' and !empty($other['map-api'])){
        $longitude = $latitude = $scale = null;
        $longitude = get_post_meta($array['post-id'],$array['longitude'],true);
        if(empty($longitude)){
          if(!empty($array['base-longitude'])){$longitude = $array['base-longitude'];}
          else{$longitude = '139.73202733';}
        }
        $latitude = get_post_meta($array['post-id'],$array['latitude'],true);
        if(empty($latitude)){
          if(!empty($array['base-latitude'])){$latitude = $array['base-latitude'];}
          else{$latitude = '35.6811673';}
        }
        $scale = get_post_meta($array['post-id'],$array['scale'],true);
        if(empty($scale)){
          if(!empty($array['base-latitude'])){$scale = $array['base-scale'];}
          else{$scale = '12';}
        }
        $return = '<div id="'.$array['map-id'].'" style="height:280px;width:100%;margin-bottom:20px;"></div>
          <script>
          function initMap() {
            var map_array = {lat: '.$latitude.', lng: '.$longitude.'};
            var map = new google.maps.Map(document.getElementById(\''.$array['map-id'].'\'), {
              zoom: '.$scale.',
              scrollwheel: false,
              center: map_array
            });
            var marker = new google.maps.Marker({
              position: map_array,
              map: map,
              draggable: true
            });
            google.maps.event.addListener( marker, "dragend", function(ev){
              document.getElementById("'.$array['latitude'].'").value = Math.round(ev.latLng.lat() * 100000) / 100000;
              document.getElementById("'.$array['longitude'].'").value = Math.round(ev.latLng.lng() * 100000) / 100000;
            });
            jQuery(document).ready(function(){
              jQuery("input#'.$array['longitude'].'").val(map_array["lng"]);
              jQuery("input#'.$array['latitude'].'").val(map_array["lat"]);
            });
          }
          </script>
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key='.$other['map-api'].'&callback=initMap">
          </script>';
      }
    }

    return $return;
  }


  public function form_nonce_set($post_id = null){
    if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ){return $post_id;}
    $nonce = $_POST['myplugin_inner_custom_box_nonce'];
    if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ){
      return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
      return $post_id;
    }
    if ( 'page' == $_POST['post_type'] ) {
      if ( ! current_user_can( 'edit_page', $post_id ) ){return $post_id;}
    } else {
      if ( ! current_user_can( 'edit_post', $post_id ) ){return $post_id;}
    }
  }

  public function form_validation($array_forms = null,$select = null){
    $return = $wrap_vali = null;
    if(!empty($array_forms) and is_array($array_forms) and !empty($select)){
      $i = 0;
      foreach ($array_forms as $form_key => $form_value) {
        $insert_vali = null;
        if(!empty($form_value['validation']) and is_array($form_value['validation'])){
          $i2 = 0;
          foreach ($form_value['validation'] as $vali) {
            if($i2 == 0){
              $insert_vali .= $vali.':true';
            }
            else{
              $insert_vali .= ','.$vali.':true';
            }
            $i2++;
          }
          if(!empty($insert_vali)){
            if($i == 0){$wrap_vali .= '"'.$form_value['key'].'":{'.$insert_vali.'}';}
            else{$wrap_vali .= ',"'.$form_value['key'].'":{'.$insert_vali.'}';}
          }
          $i++;
        }
        if(is_array(@$form_value['inner-form'])){
          foreach ($form_value['inner-form'] as $children_form) {
            $insert_vali2 = null;
            if(!empty($children_form['validation']) and is_array($children_form['validation'])){
              $i2 = 0;
              foreach ($children_form['validation'] as $vali) {
                if($i2 == 0){
                  $insert_vali2 .= $vali.':true';
                }
                else{
                  $insert_vali2 .= ','.$vali.':true';
                }
                $i2++;
              }
              if(!empty($insert_vali2)){
                if($i == 0){$wrap_vali .= '"'.$children_form['key'].'":{'.$insert_vali2.'}';}
                else{$wrap_vali .= ',"'.$children_form['key'].'":{'.$insert_vali2.'}';}
              }
              $i++;
            }
          }
        }
      }

      if(!empty($wrap_vali)){
        $return = '
        <script type="text/javascript">
        (function(){
          jQuery.extend(jQuery.validator.messages, {
            email: \'<div class="input-error">正しいメールアドレスを入力して下さい</div>\',
            number: \'<div class="input-error">数字で入力して下さい</div>\',
            required: \'<div class="input-error">入力必須項目です</div>\',
            word6_12_hankakueisu: \'<div class="input-error">半角英数6〜12文字でご入力下さい</div>\',
            word4_hankakueisu: \'<div class="input-error">半角英数4文字以上でご入力下さい</div>\',
            word6_hankakueisu: \'<div class="input-error">半角英数6文字以上でご入力下さい</div>\'
          });

          var methods = {
            word6_12_hankakueisu: function(value, element){
              return this.optional(element) || /^\w{6,8}$/.test(value);
            },
            word6_hankakueisu: function(value, element){
              return this.optional(element) || /^\w{6,}$/.test(value);
            },
            word4_hankakueisu: function(value, element){
              return this.optional(element) || /^\w{4,}$/.test(value);
            }
          };

          jQuery.each(methods, function(key) {
            jQuery.validator.addMethod(key, this);
          });

          var rules = {
            '.$wrap_vali.'
          };

          jQuery(function(){
            jQuery(\''.$select.'\').validate({
              rules: rules,
              errorPlacement: function(error, element){
                if (element.is(\':radio\')) {
                  error.appendTo(element.parent());
                }else {
                  error.insertAfter(element);
                }
              }
            });
          });

        })();
        </script>
        ';
      }
    }
    return $return;
  }


  public function form_saves($array_forms){
    if(!empty($array_forms) and is_array($array_forms)){
      foreach ($array_forms as $this_form) {
        $this->form_save($this_form);
      }
    }
  }


  public function form_submit($array = null){
    return '<div class="form-submit">
      <button class="button-submit" type="submit" name="'.$array['key'].'" id="'.$array['key'].'" value="'.$array['value'].'">'.$array['label'].'</button>
    </div>';
  }


  public function form_save($array = null){
    $mydata = null;

    if(@$array['type'] == 'map'){}
    elseif(@$array['type'] == 'wrap'){
      foreach ($array['inner-form'] as $children_form) {
        $this->form_save($children_form);
      }
    }
    elseif(!empty($array['value-type'])){
      if($array['value-type'] == 'cf' and !empty($array['post-id'])){
        if($array['type'] == 'textarea' or $array['type'] == 'textarea-large'){$mydata = esc_html( @$_POST[@$array['key']] );}
        elseif($array['type'] == 'checkbox-multi'){
          $mydata = @$_POST[@$array['key']];
        }
        else{$mydata = sanitize_text_field( @$_POST[@$array['key']] );}
        if(!empty($mydata)){
          update_post_meta( $array['post-id'], @$array['key'], $mydata );
        }
    		else{
          delete_post_meta( $array['post-id'], @$array['key']);
        }
      }
      elseif($array['value-type'] == 'user' and !empty($array['user-id'])){
        if($array['type'] == 'textarea' or $array['type'] == 'textarea-large'){$mydata = esc_html( @$_POST[@$array['key']] );}
        elseif($array['type'] == 'checkbox-multi'){
          $mydata = @$_POST[@$array['key']];
        }
        else{$mydata = sanitize_text_field( @$_POST[@$array['key']] );}
        if(!empty($mydata)){
          update_user_meta( $array['user-id'], @$array['key'], $mydata );
        }
    		else{
          delete_post_meta( $array['user-id'], @$array['key']);
        }
      }
      elseif($array['value-type'] == 'option'){
        if($array['type'] == 'textarea' or $array['type'] == 'textarea-large'){$mydata = esc_html( @$_POST[@$array['key']] );}
        elseif($array['type'] == 'checkbox-multi'){
          $mydata = @$_POST[@$array['key']];
        }
        else{$mydata = sanitize_text_field( @$_POST[@$array['key']] );}
        if(!empty($mydata)){update_option( @$array['key'], $mydata );}
        else{delete_option( @$array['key'] );}
      }
    }
  }





}
