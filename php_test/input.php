<?php
  session_start();

  require 'validation.php';

  if (!empty($_POST)) { 
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
  }
 // if (!empty($_GET)) { 
  //   echo '<pre>';
  //   var_dump($_GET);
  //   echo '</pre>';
  // }

  // スーパーグローバル変数　php 9種類
  // 連想配列 

  // if (!empty($_SESSION)) { 
  //   echo '<pre>';
  //   var_dump($_SESSION);
  //   echo '</pre>';
  // }


  header("X-FRAME-OPTIONS:DENY");

  $pageFlag = 0;
  $errors = validation($_POST);

  if (!empty($_POST["btn_confirm"]) && empty($errors)) { 
    $pageFlag = 1;
  } elseif (!empty($_POST["btn_submit"]) && empty($errors)) { 
    $pageFlag = 2;
  } 

  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Document</title>
</head>
<body>

  <?php if ($pageFlag === 0) : ?> 
  <?php
    if (!isset($_SESSION["csrfToken"])) {
      $csrfToken = bin2hex(random_bytes(32));
      $_SESSION["csrfToken"] = $csrfToken;
    }

    $token = $_SESSION["csrfToken"];
  ?>

  <?php if (!empty($errors) && (!empty($_POST["btn_confirm"]) || !empty($_POST["btn_submit"]))) : ?>
  <?php echo "<ul>" ?>
  <?php
    foreach ($errors as $error) {
      echo "<li>".$error ."</li>";
    }
  ?>
  <?php echo "</ul>" ?>
  <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <form action="input.php" method="post">
        <div class="form-group">
          <label for="your_name">氏名</label>
          <input type="text" class="form-control" name="your_name" id="your_name" value="<?php if(!empty($_POST["your_name"])) { echo h($_POST["your_name"]); } ?>" required />
        </div>
        <!-- <input type="checkbox" name="sports[]" value="野球">野球
        <input type="checkbox" name="sports[]" value="テニス">テニス
        <input type="checkbox" name="sports[]" value="サッカー">サッカー -->
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php if(!empty($_POST["email"])) { echo h($_POST["email"]); } ?>"/>
        </div>
        <div class="form-group">
          <label for="url">ホームページ</label>
          <input type="url" class="form-control" name="url" id="url" value="<?php if(!empty($_POST["url"])) { echo h($_POST["url"]); } ?>"/>
        </div>
        性別
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="inlineRadio1" name="gender" value="0" <?php if (isset($_POST["gender"]) && $_POST["gender"] === "0") { echo "checked"; } ?> >
          <label class="form-check-label" for="inlineRadio1">男性</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" class="form-check-input" id="inlineRadio2" name="gender" value="1" <?php if (!empty($_POST["gender"]) && $_POST["gender"] === "1") { echo "checked"; } ?> >
          <label class="form-check-label" for="inlineRadio2">女性</label>
        </div>
        <br/>
        年齢
        <select name="age" class="form-select" aria-label="Default select example">
          <option value="">選択してください</option>
          <option value="1" selected>～19歳</option>
          <option value="2">20～29歳</option>
          <option value="3">30～39歳</option>
          <option value="4">40～49歳</option>
          <option value="5">50～59歳</option>
          <option value="6">60歳～</option>
        </select>
        <br>
        お問い合わせ内容
        <textarea name="contact"><?php if(!empty($_POST["contact"])) { echo h($_POST["contact"]); } ?></textarea>
        <br/>
        <input type="checkbox" name="caution" value="1">注意事項にチェックする
        <input type="submit" name="btn_confirm" value="確認する" />
        <input type="hidden" name="csrf" value="<?php echo $token; ?>" />
  </form>
  <?php endif; ?>

  <?php if ($pageFlag === 1) : ?>
    <?php if ($_POST["csrf"] === $_SESSION["csrfToken"]) : ?>
    <form action="input.php" method="post">
      氏名
      <?php echo h($_POST["your_name"]); ?>
      <br />
      <!-- <input type="checkbox" name="sports[]" value="野球">野球
      <input type="checkbox" name="sports[]" value="テニス">テニス
      <input type="checkbox" name="sports[]" value="サッカー">サッカー -->
      メールアドレス
      <?php echo h($_POST["email"]); ?>
      <br />
      ホームページ
      <?php echo h($_POST["url"]); ?>
      <br />
      性別
      <?php 
        if ($_POST["gender"] === "0") { echo "男性"; } 
        if ($_POST["gender"] === "1") { echo "女性"; } 
      ?>
      <br />
      年齢
      <?php
        if ($_POST["age"] === "1") { echo "～19歳"; } 
        if ($_POST["age"] === "2"
        ) { echo "20～29歳"; } 
        if ($_POST["age"] === "3") { echo "30～39歳"; } 
        if ($_POST["age"] === "4") { echo "40～49歳"; } 
        if ($_POST["age"] === "5") { echo "50～59歳"; } 
        if ($_POST["age"] === "6") { echo "60歳～"; } 
      ?>
      <br>
      お問い合わせ内容
      <?php echo h($_POST["contact"]); ?>

      <input type="submit" name="back" value="戻る" />
      <input type="submit" name="btn_submit" value="送信する" />
      <input type="hidden" name="your_name" value="<?php echo h($_POST["your_name"]); ?>" />
      <input type="hidden" name="email" value="<?php echo h($_POST["email"]); ?>" />
      <input type="hidden" name="url" value="<?php echo h($_POST["url"]); ?>" />
      <input type="hidden" name="gender" value="<?php echo h($_POST["gender"]); ?>" />
      <input type="hidden" name="age" value="<?php echo h($_POST["age"]); ?>" />
      <input type="hidden" name="contact" value="<?php echo h($_POST["contact"]); ?>" />
      <input type="hidden" name="caution" value="<?php echo h($_POST["caution"]); ?>" />
      <input type="hidden" name="csrf" value="<?php echo $_POST["csrf"]; ?>" />
      </form>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($pageFlag === 2) : ?> 
    <?php if ($_POST["csrf"] === $_SESSION["csrfToken"]) : ?>

    <?php require '../mainte/insert.php';
      insertContact($_POST);
    ?>

    送信が完了しました。 

    <?php unset($_SESSION["csrfToken"]); ?>
    <?php endif; ?>
  <?php endif; ?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>