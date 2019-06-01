<?php
/**
 * WPの管理画面カスタムフィールドの書き出し
 *
 * @copyright 合同会社エッセンス All Rights Reserved
 * @license https://opensource.org/licenses/mit-license.html MIT License
 * @author 稲垣亮 ryo0702@gmail.com
 */

class wpaxRegistCFForm {
  public $name_array;
	public function __construct($name_array) {
    $this->box_title = $name_array['box_title'];
    $this->box_name = $name_array['box_name'];
    $this->post_type = @$name_array['post_type'];
    $this->load_array_path = @$name_array['load_array_path'];
    $this->option_key_map_api = @$name_array['option_key_map_api'];

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
    $post_types = $this->post_type;
    if (in_array($post_type, $post_types)) {
      add_meta_box($this->box_name,$this->box_title,array($this,'view'),$post_type,'advanced','high');
    }
	}

	public function save( $post_id ) {
    $class_form_admin = new wpaxForm();

		$class_form_admin->form_nonce_set();
    if(file_exists($this->load_array_path)){
      require $this->load_array_path;
      $class_form_admin->form_saves($array_forms);
    }
	}

	public function view( $post ) {
    $class_form_admin = new wpaxForm();

    $other = null;
		wp_nonce_field('myplugin_inner_custom_box','myplugin_inner_custom_box_nonce');
    $post_id = $post->ID;
    if(file_exists($this->load_array_path)){
      require $this->load_array_path;
      if(!empty($this->option_key_map_api)){
        $other['map-api'] = $this->option_key_map_api;
      }
      if(!empty($array_forms) and is_array($array_forms)){
        echo '<div style="padding-top:20px;width:100%;">';
        foreach ($array_forms as $this_form) {
          echo '<div style="width:100%;">'.$class_form_admin->form($this_form,$other).'</div>';
        }
        echo '</div>';
      }
    }
	}

}
