<!DOCTYPE HTML>
<html lang="es">
<?php
session_start();


define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . $APP_DIR); //Aplikazioaren karpeta edozein lekutatik atzitzeko.
define('HREF_APP_DIR', $APP_DIR); //Aplikazioaren views karpeta edozein lekutatik deitzeko
define('HREF_VIEWS_DIR', $APP_DIR . '/src/views'); //Aplikazioaren views karpeta edozein lekutatik deitzeko
define('HREF_JS_DIR', $APP_DIR . '/src/js'); //Aplikazioaren views karpeta edozein lekutatik deitzeko

require_once(APP_DIR . '/src/views/parts/logs.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
writeLog("Orria kargatu da", ["url" => $actual_link, "get" => json_encode($_GET), "post" => json_encode($_POST)]);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Azoka</title>

    <!-- CSRF Token -->
    <!-- TODO: Gehitzeko -->

    <!-- External -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
    //XMLko konfiguraziotik hartzen dute informazioa

    $mainColor = "#a1a2a3";
    $footerColor = "#555555";

    ?>
    <style>
        :root {
            --mainColor: <?= $mainColor ?>;
            --footerColor: <?= $footerColor ?>;
        }

        /* AZPIAN EGON BEAHR DA CSS-a mainColor eta footerColor erabiltzen dituztenak */
    </style>
    <!-- Internal -->
    <link href="<?= HREF_APP_DIR ?>/src/css/app.css" rel="stylesheet">


</head>

<body class="">