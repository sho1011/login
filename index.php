<?php
$err_msg = "";

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  try{
    $db = new PDO('mysql:host=localhost;dbname=sample', 'shoken', 'shoken');
    $sql = 'select count(*) from users where username = ? and password = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username, $password));
    $result = $stmt->fetch();
    $stmt = null;
    $db = null;

    if($result[0] != 0){
      header('Location:http://localhost:3000/formation/home.php');
      exit;
    }else{
      $err_msg = "ユーザー名またはパスワードが誤りです";
    }
  }catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <title>ログイン画面</title>
</head>
<body>

<h1>ログイン</h1>
<form action="" method="POST">
    ログインID：<input type="text" name="username" value=""><br>
    パスワード：<input type="password" name="password" value=""><br>
    <input type="submit" name="login" value="ログイン">
</form>
<a href="signup.php">新規登録</a>

</body>

</html>
