<?php

error_reporting(E_ALL);
include("baglanti.php");

session_start();
//$mail= $_SESSION["mail1"];
//$telNo= $_SESSION["tel1"];
//$menu=$_SESSION["menu1"];
//$orderCount=$_SESSION["OrderCount"];


$bul="SELECT * FROM  kullanicilar ";
$kayit=$baglanti->query($bul);

if($kayit->num_rows>0){

    while($satir=$kayit->fetch_assoc()){

        echo "email:".$satir["email"];
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
                      <div class="card-header ">

                      </div>
                      <div class="card-body">



                          <h4> Teşekkürler, Başvurunuz  Alınmıştır</h4>
<!--                          <table class="table table-bordered">-->
<!--                              <thead>-->
<!--                              <tr>-->
<!--                                  <th scope="col">#</th>-->
<!--                                  <th scope="col">TelNo</th>-->
<!--                                  <th scope="col">Menu</th>-->
<!--                                  <th scope="col">Adet</th>-->
<!--                              </tr>-->
<!--                              </thead>-->
<!--                              <tbody>-->
<!--                              <tr>-->
<!--                                  <th scope="row">1</th>-->
<!--                                  <td>--><?php //echo $telNo?><!--</td>-->
<!--                                  <td>--><?php //echo $menu?><!--</td>-->
<!--                                  <td>--><?php //echo $orderCount?><!--</td>-->
<!--                              </tr> </tbody>-->
<!--                          </table>-->

                      </div>
                  </div>

              </div>
          </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
