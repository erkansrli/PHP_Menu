<?php
error_reporting(E_ALL);
session_start();
include("baglanti.php");

if(isset($_POST["kayıt"])){

    $mail= $_SESSION["mail1"] ;


    $menu = $_POST["menu1"];
    $orderCount=$_POST["OrderCount"];
//$_SESSION["menu1"]=$menu;
// $_SESSION["OrderCount"]=$orderCount;

    if ($menu == "" or  $orderCount ==""){
        $userControl = false;
        $userMsg = "Lütfen tüm alanları giriniz";
    }else {
       $userQuery= "SELECT id from kullanicilar WHERE email= '$mail'";
       $menuQuery = "SELECT id from menu WHERE urun_adi='$menu'";

       $userResult = mysqli_query($baglanti,$userQuery);
       $menuResult = mysqli_query($baglanti,$menuQuery);

        $loggedInUserId = mysqli_fetch_assoc($userResult)['id'];
       $choosenMenuId = mysqli_fetch_assoc($menuResult)['id'];
       $userControl = false;

       $insertOrder= "INSERT INTO siparis(kullanici_id,urun_id,order_count) VALUES ($loggedInUserId, $choosenMenuId, $orderCount)";
       if (mysqli_query($baglanti,$insertOrder )  ) {
            $userMsg = "Siparişiniz Alınmıştır";
            $userControl = true;
       }
    }
    if ($userControl){
        echo "<div class='alert alert-secondary' role='alert'>
                $userMsg
            </div>";
    }else{
        echo "<div class='alert alert-secondary' role='alert'>
                $userMsg
            </div>";
    }
    if($userControl){
        header("Location: end.php ");
        die();
    }


}


?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="style.css">
    <title>Menu</title>
</head>
<body>
      <div class="container">
          <div class="row">
              <div class="col-6 m-auto mt-3">

                  <div class="card">
                      <div class="card-header bg-cl">
                          <h4>Menuyu Seçiniz</h4>
                      </div>
                      <div class="card-body">
                          <form action="" method="post">
                          <div class="form-check">
                              <input class="form-check-input" type="radio" value="HamburgerMenu" name="menu1" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                  <div class="card mb-3" style="max-width: 540px;">
                                      <div class="row g-0">
                                          <div class="col-md-4">
                                              <img src="https://img.pixers.pics/pho_wat(s3:700/FO/64/09/13/58/700_FO64091358_7b4edc248e188dc94f69ec8c6262f06c.jpg,700,700,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,480,650,jpg)/duvar-resimleri-hamburger-ve-kola.jpg.jpg" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                              <div class="card-body">
                                                  <h5 class="card-title">Hamburger Menu</h5>
                                                  <p class="card-text">Hamberger ve  Kola. </p>
                                                  <p class="card-text"><small class="text-muted">50 TL</small></p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </label>
                          </div>


                          <div class="form-check">
                              <input class="form-check-input" type="radio" value="TostMenu" name="menu1" id="flexRadioDefault2">
                              <label class="form-check-label" for="flexRadioDefault2">
                                  <div class="card mb-3" style="max-width: 540px;">
                                      <div class="row g-0">
                                          <div class="col-md-4">
                                              <img src="https://media.istockphoto.com/id/942381352/tr/vekt%C3%B6r/tost-vekt%C3%B6r-%C3%A7izim.jpg?s=170667a&w=0&k=20&c=JucJBk5p56abe2fS8-LS-ee3ONmCVQ4aAiZNWxLlxOc=" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                              <div class="card-body">
                                                  <h5 class="card-title">Tost Menü</h5>
                                                  <p class="card-text"> Karışık Tost ve Çay.</p>
                                                  <p class="card-text"><small class="text-muted">27TL</small></p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </label>
                          </div>
                          <h4>Sayı Adedini Giriniz</h4>
                          <input  name="OrderCount" type="number">
                              <button class="btn btn-primary fl-lft" name="kayıt">Gönder</button>
                          </form>
                      </div>
                  </div>


<!--                  <div class="btn-group fl-lft" >-->
<!--                      <a href="end.php" class="btn btn-primary" >Gönder</a>-->
<!--                  </div>-->



              </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
