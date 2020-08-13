<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1.0">
  <title>closet</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/main.css">
</head>

<body>

<form method="post" action="mycode_add_check.php"enctype="multipart/form-data">

    画像名を入力してください。<br/>
    <input id="p_name" type="text" name="name"><br/>

    画像を選んでください。<br/>
    <input id="p_file" type="file" name="data"><br/>
    
    <br/>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" name="upload" value="OK">
 
  </form>



  
</body>

</html>