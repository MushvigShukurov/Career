<?php require_once 'dataCEK.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $cssLink ?>">
    <title><?=$siteTitle?></title>
</head>

<body>

    <div class="container">
        <div class="navbar">
            <a href="https://instagram.com/mushvigsh/">Ustablogger.com</a>
            <ul>
                <li>
                    <a href="<?=$url?>" id="postsBTN" class="<?php if(!isset($_GET['about'])){echo "active"; } else { echo '';} ?>">Posts</a>
                </li>
                <li>
                    <a href="<?=$url?>/about" id="aboutBTN" class="<?php if(isset($_GET['about'])){echo "active"; } else { echo '';} ?>">About</a>
                </li>
            </ul>
        </div>
        <div class="socialMedia">
            <?php foreach($socialMediaLinks as $mediaLink): ?>
                <a href="<?=$mediaLink[1]?>" target="_blank"><?=$mediaLink[0]?></a>
            <?php endforeach ?>
        </div>
        <main>