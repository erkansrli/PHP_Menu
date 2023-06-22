<?php

error_reporting(E_ALL);
include("baglanti.php");
session_start();
if(isset($_POST["login"])) {
    $mail = $_POST["email"];
    $sifre = $_POST["sifre"];
    $telNo = $_POST["tel"];

    $_SESSION["mail1"] = $mail;
    $_SESSION["tel1"] = $telNo;
    $userControl = false;
    if($mail == "" or $sifre == "" or $telNo == ""){
        $userControl = false;
        $userMsg = "Lütfen tüm alanları giriniz";
    }else{

        $userQuery = "SELECT email, parola FROM kullanicilar WHERE email='$mail' AND parola='$sifre'";
        if(mysqli_num_rows(mysqli_query($baglanti, $userQuery))){
            $userMsg = "Başarıyla Giriş Yapılmıştır";
            $userControl = true;
        }else{
            $userMsg = "Kullanıcı oluşturulup başarıyla Giriş Yapılmıştır";
            $insertQuery = "INSERT INTO kullanicilar(email,parola,tel) VALUES ('$mail','$sifre','$telNo')";
            $userControl = mysqli_query($baglanti, $insertQuery);
        }

    }


   if ($userControl){
       echo "<div class='alert alert-secondary' role='alert'>
                $userMsg
            </div>";
       if($userControl){
           header("Location: choose.php ");

           die();
       }
   }else{
       echo "<div class='alert alert-danger' role='alert'>
          $userMsg
        </div>";
   }

}
?>
<!doctype html>
<html lang="en"

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Menu</title>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header bg-cl">
                    <h4>Giriş Yap</h4>
                </div>
                <div class="card-body">
                    <form  action="" method="post">
                        <div class="form-group">
                            <label for="Email">Email Adresiniz</label>
                            <input type="email"  class="form-control" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="Sifre">Sifreniz</label>
                            <input type="password" class="form-control" name="sifre" >
                        </div>
                        <div class="form-group">
                            <label for="Tel">Telefon Numarası</label>
                            <input type="tel" class="form-control" name="tel" >
                        </div>
                        <button class="btn btn-primary fl-lft" name="login">Kaydol</button>
                    </form>
                </div>
            </div>
<!--            <a href="index.php" class="btn btn-primary fl-lft">Sonraki</a>-->
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
