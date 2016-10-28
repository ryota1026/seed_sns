<?php
    //セッションの設定
    session_start();

    //各入力欄のvalueの初期値を定義
    $nickname = '';

    //フォームからデータが送信された場合
    if(!empty($_POST)) {
      $nickname = $_POST['nickname'];
      //ニックネーム未入力チェック
      if($_POST['nickname'] == '') {
         $error['nickname'] = 'blank';
      }
      //ニックネーム未入力チェック
      if($_POST['email'] == '') {
         $error['email'] = 'blank';
      }

      if(empty($error)) {
        header('Location: check.php');
        exit();
      }
    }

    //エラーがなかった場合

?>

<form method='post' action="index.php">
  <input type="text" name="nickname" value="<?php echo $nickname; ?>"><br>
  <?php if(isset($error['nickname']) && $error['nickname'] == 'blank'): ?>
     <p style="color:red;">*ニックネームを入力してください！</p>
  <?php endif; ?>
  <input type="email" name="email"><br>
  <?php if(isset($error['email']) && $error['email'] == 'blank'): ?>
     <p style="color:red;">*メールアドレスを入力してください！</p>
  <?php endif; ?>
  <input type="submit" value="確認画面へ">
</form>