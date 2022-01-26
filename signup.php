
<?php
if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $db = new PDO('mysql:host=localhost;dbname=sample', 'shoken', 'shoken');
        $sql = 'insert into users(username, password) values(?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($username, $password));
        $stmt = null;
        $db = null;
        header('Location: http://localhost:3000/formation/index.php');
        exit;
      } catch (PDOException $e) {
var_dump($_POST['username']);
          echo $e->getMessage();
          exit;
      }
}
?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "utf-8">
        <title>アカウント登録</title>
</head>

<body>
    <h1>新規登録画面</h1>
    <form action="" method="POST">
        ログインID:<input type="text" name="username" value=""><br>
        パスワード:<input type="password" name="password" value=""><br>
        <input type="submit" name="signup" value="新規登録">
    </form>  
</body>

