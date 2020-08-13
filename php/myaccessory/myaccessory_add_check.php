
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
<?php ini_set( 'display_errors', 1 ); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,
user-scalable=yes,initial-scale=1.0">
  <title>closet</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/main.css">
</head>

<body>
<?php
try{
    require_once('../../common/common.php');

  $post=sanitize($_POST);
  
  $picture_name = $_POST['name'];
  $picture_data = $_FILES['data'];

  if(empty($_POST['name'])){


      print('画像名が入力されていません。<br/>');

  }
  else{
    
      print('画像名：');
      print($picture_name);
      print('<br/>');

  }

  if($picture_data['size'] > 0){

      if($picture_data['size'] > 1000000){

          print('画像が大きすぎます');

      }
      else{

          move_uploaded_file($picture_data['tmp_name'],'../../images/myaccessory/'.$picture_data['name']);
          print('<img id="picture-check" src="../../images/myaccessory/'.$picture_data['name'].'">');
          print('<br/>');

      }
  }
  else{

    print('画像がありません <br/>');
    print('<form>');
    print('<input type="button" onclick="history.back()" value="戻る">');
    print("</form>");  
    exit();

  }
  
  if(empty($_POST['name']) || $picture_data['size'] > 1000000){

      print('<form>');
      print('<input type="button" onclick="history.back()" value="戻る">');
      print("</form>");  

  }
  else{

      print('上記の画像を追加します。<br/>');
      print('<form method="post" action="myaccessory_add_done.php">');
      print('<input type="hidden" name="name" value="'.$picture_name.'">');
      print('<input type="hidden" name="gazou_name" value="'.$picture_data['name'].'">');
      print('<br/>');
      print('<input id="check-back" type="button" onclick="history.back()" value="戻る">');
      print('<input id="check-ok" type="submit" value="OK">');
      print('</form>');

  }
}
catch(Exception $e){
    print("接続エラー:{$e->getMessage()}");
      exit();
  }

  

?>
</body>

</html>