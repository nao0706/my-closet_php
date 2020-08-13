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
        $picture_code = $_GET['picturecode'];

        $dsn = 'mysql:dbname=mycloset;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name,data FROM mybags WHERE code = ?';
        $stmt = $dbh->prepare($sql);
        $data[] = $picture_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $picture_name = $rec['name'];
        $picture_data = $rec['data'];

        $dbh = null;
        //var_dump($rec);
        if($picture_name == ''){

          $disp_data = '';

        }
        else{

          $disp_data = '<img id="picture-dalete" src="../../images/mybags/'.$picture_data.'">';

        }

    }
    catch(Exception $e){
      print("接続エラー:{$e->getMessage()}");
        exit();
    }
  ?>

  画像削除<br/>
  <br/>
  画像名：
  <?php print($picture_name);?>
  <br/> 
  <br/>
  <?php print($disp_data);?>
  <br/>
  この画像を削除してよろしいですか？<br/>
  <form method="post" action="mybags_delete_done.php">
  <input type="hidden" name="picturecode" value="<?php print($picture_code);?>">
  <input type="hidden" name="picturedata" value="<?php print($picture_data);?>">
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">

  </form>
</body>

</html>