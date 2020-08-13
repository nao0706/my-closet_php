<?php
/*
session_start();
//var_dump($_SESSION);
//$_SESSION = array();
//var_dump($_SESSION);
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){

  print('ログインされていません。<br/>');
  print('<a href="../staff_login.html">ログイン画面へ</a>');
  exit();

}
else{

  print($_SESSION['staff_name']);
  print('さんログイン中');
  print('<br/>');
  
}
*/
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,
user-scalable=yes,initial-scale=1.0">
  <title>test</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
  <?php
    try{
        $picture_code = $_POST['picturecode'];
        $picture_data = $_POST['picturedata'];

        $dsn = 'mysql:dbname=mycloset;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM mycode WHERE code = ?';
        $stmt = $dbh->prepare($sql);

        $data[] = $picture_code;
        $stmt->execute($data);

        $dbh = null;

        if($picture_data != ''){
          
          unlink('../../images/mycode/'.$picture_data);

        }

    }
    catch(Exception $e){
          print("接続エラー:{$e->getMessage()}");
          exit();
    }

    print('削除しました。<br/><br/>');
  ?>

  <a href="mycode_form.php">戻る</a>
</body>

</html>