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
<section id="closet" class="view">
  <header>
    <div id="header">
      <div id="logo">
        <p class="mycloset-logo">My Closet</p>
        <!--<a href="./index.html"><img src="./images/logo.png" alt="Mycloset"></a>-->
      </div>
      
      <!--<button class="btn btn-primary logout-button">
        ログアウト
      </button>
      -->
    </div>
  </header>
  <div id="cover">
    <h1 id="cover__title">Accessory</h1>
  </div>
  <nav class="globalnav">
      <div class="container">
        <div class="row">
          <ul class="globalnav-list">
            <li><a href="../mycode/mycode_form.php">MyCode</a></li>
            <li><a href="../myouter/myouter_form.php">Outer</a></li>
            <li><a href="../mytops/mytops_form.php">Tops</a></li>
            <li><a href="../mypants/mypants_form.php">Pants</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <nav class="globalnav2">
      <div class="container">
        <div class="row">
          <ul class="globalnav-list2">
            <li><a href="../myshoes/myshoes_form.php">Shoes</a></li>
            <li><a href="../mybags/mybags_form.php">Bags</a></li>
            <li><a href="myaccessory_form.php">Accessory</a></li>
            <li><a href="../myothers/myothers_form.php">Others</a></li>
          </ul>
        </div>
      </div>
    </nav>

        
</section>

<div id="main">
  <div class="add-item">  
    <input type="button" onclick="location.href='myaccessory_add.php'" value="アイテムの追加">
  </div>
    <?php
        try{

            $dsn = 'mysql:dbname=mycloset;host=localhost;charset=utf8';
            $user = 'root';
            $password = 'root';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM myaccessory WHERE 1';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

            
            print('<form  method="post" action="myaccessory_branch.php">');
      

            while(true){

                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $picture_data=$rec['data'];
                $picture_name=$rec['name'];
                $picture_code=$rec['code'];

                if($rec == false){

                    break;
                }

              //var_dump($rec);
              
                //ラジオボタンにcodeを付与する
                print('<input type="radio" name="picturecode" value="'.$picture_code.'">');
                print('<div id="cloth-item"><img  src="../../images/myaccessory/'.$picture_data.'">');
                print('<h5>'.$picture_name.'</h5>');
                //ラジオボタンを作らずにhiddenを利用してみたが不具合が起きた。
                /*print('<input type="hidden" name="picturecode" value="'.$picture_code.'">');*/
                print('<div id="cloth-delete"><input type="submit" name="delete" value="削除"></div>');
                print('</div>');
                print('<br/>');
          

            
                
            }

          
            print('</form>');

        }
        catch(Exception $e){
          print("接続エラー:{$e->getMessage()}");
            exit();
        }
    ?>
  </div>
</body>

</html>