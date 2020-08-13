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
*/
  
  if(isset($_POST['delete']) == true){
      

    if(isset($_POST['picturecode']) == false){

        header('Location: myaccessory_ng.php');
        exit();

    }
    $picture_code = $_POST['picturecode'];
    header('Location: myaccessory_delete.php?picturecode='.$picture_code);
    exit();

  }
?>
