<?php
// Config
$page = array(
  'title' => 'Form',
  'description' => 'Formは入力フォームなどに使用できる要素です',
  'path' => '../'
);

// View
require $page['path']."parts/head.php";
?>

<header>
  <h1><?php echo @$page['title']; ?></h1>
  <p><?php echo @$page['description']; ?></p>
</header>
<section class="text">
  <h2>.input</h2>
  <p>
    .inputはテキスト・数字・メールアドレス・テキストエリア・セレクトなどにも適応。
  </p>
</section>
<section class="example">
  <div class="view">
    <div style="margin-bottom:10px;">
      <input name="text" type="text" class="input" value="input[type=text].input" placeholder="Placeholder" />
    </div>
    <div style="margin-bottom:10px;">
      <input name="email" type="email" class="input" value="email@email.com" />
    </div>
    <div style="margin-bottom:10px;">
      <input name="password" type="password" class="input" value="password" />
    </div>
    <div style="margin-bottom:10px;">
      <input name="number" type="number" class="input" value="12345" />
    </div>
    <div style="margin-bottom:10px;">
      <textarea name="textarea" class="input" placeholder="Placeholder">input.textarea</textarea>
    </div>
    <div style="margin-bottom:10px;">
      <select name="select" class="input">
        <option value="">input.selectを選択して下さい</option>
        <option value="マントヒヒ">マントヒヒ</option>
        <option value="サイ">サイ</option>
        <option value="ライオン">ライオン</option>
      </select>
    </div>
    <div style="margin-bottom:10px;">
      <label><input name="radio" type="radio" class="input" value="radio1" checked />input[type=radio].input1</label>
      <label><input name="radio" type="radio" class="input" value="radio1" checked />input[type=radio].input2</label>
      <label><input name="radio" type="radio" class="input" value="radio1" checked />input[type=radio].input3</label>
    </div>
  </div>
  <div class="comment">テキスト・メール・パスワード・数字の何にクラスが着いても同じように表示</div>
</section>

<section class="text">
  <h2>.group-form</h2>
  <p>
    .group-formはインプットやテキストエリアなどのフォーム要素をまとめる機能を持っています。
  </p>
</section>
<section class="example">
  <div class="view">
    <ul class="group-form">
      <li class="group-input">
        <div class="group-input-title">タイトル</div>
        <div class="group-input-content">
          <input name="text" type="text" class="input" value="" placeholder="インプット①" />
        </div>
        <div class="group-input-description">
          説明文がここに入ります。
        </div>
      </li>
      <li class="group-input">
        <div class="group-input-title">タイトル</div>
        <div class="group-input-content">
          <input name="text" type="text" class="input" value="" placeholder="インプット②" />
        </div>
        <div class="group-input-description">
          説明文がここに入ります。
        </div>
      </li>
      <li class="group-input">
        <div class="group-input-title">タイトル</div>
        <div class="group-input-content">
          <input name="text" type="text" class="input" value="" placeholder="インプット③" />
        </div>
        <div class="group-input-description">
          説明文がここに入ります。
        </div>
      </li>
      <li class="group-submit">
        <ul class="buttons">
          <li><button type="submit" class="button button-primary">送信する</button></li>
          <li><button type="button" class="button button-warning">クリア</button></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="comment">テキスト・メール・パスワード・数字の何にクラスが着いても同じように表示</div>
</section>

<nav class="back"><a href="<?php echo $page['path']; ?>index.php">トップへ</a></nav>

<?php
require $page['path']."parts/foot.php";
