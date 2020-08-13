<?php
/*session_start();
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
*/?>
<?php ini_set( 'display_errors', 1 ); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,
user-scalable=yes,initial-scale=1.0">
  <title>test</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/pro.css">
</head>

<body>
  <?php
    try{
        require_once('../../common/common.php');

        $post=sanitize($_POST);

        $picture_name = $_POST['name'];
        $picture_data_name = $_POST['gazou_name'];

        $dsn = 'mysql:dbname=mycloset;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO myothers (name,data) VALUES(?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $picture_name;
        $data[] = $picture_data_name;
        
        $stmt->execute($data);

       
        $dbh = null;

        print($picture_name);
        print('を追加しました。<br/>');
    }
    catch(Exception $e){
        print("接続エラー:{$e->getMessage()}");
    
    }
  ?>

  <a href="myothers_form.php">戻る</a>
</body>

</html>