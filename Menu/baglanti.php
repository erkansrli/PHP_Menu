<?php
error_reporting(E_ALL);
//$host="Localhost";
//$kullanici="root";
//$parola="";
//$vt="uyelik";

$host="http://185.27.134.10";
$kullanici="epiz_33428670";
$parola="qOfnVt5Ntl6bh65";
$vt="epiz_33428670_uyelik";

$baglanti= mysqli_connect($host,$kullanici,$parola,$vt);

mysqli_set_charset($baglanti,"UTF8");

    if($baglanti){
    echo "Baglanti başarılı";
 }


?>
