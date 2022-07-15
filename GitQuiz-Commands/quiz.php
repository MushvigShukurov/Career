<?php

require_once 'php/suallar.php';
if (!isset($_POST['checkAnswer'])) {
    $countSual = count($questions);
    if ($countSual > 10) {
        $ids = rand(10, $countSual);
        $min = $ids - 10;
    } else {
        $ids = $countSual;
        $min = 0;
    }
    $suallar = array_splice($questions, $min, 10);
}

if (isset($_POST['checkAnswer'])) {
    array_pop($_POST);
    
    $puan = 0;
    $variants = [];
    $corrects = [];
    
    
    for ($i = 1; $i <= (count($_POST) / 2); $i++) {
        array_push($corrects, $_POST["right" . $i]);
        array_push($variants, $_POST["question" . $i]);
        if ($_POST["right" . $i] == $_POST["question" . $i]) {
            $puan += 1;
        }
    }
    $sualSayi = count($corrects);
    $maxPuan = $sualSayi*10;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shukurov Mushvig - Git Dərsləri | Quiz</title>
    <link rel="shortcut icon" href="https://ustablogger.com/assets/img/favicon.png" type="image/png">
    <!-- Color Css -->
    <link rel="stylesheet" href="assets/css/color.css">
    <!-- Reset Css -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <!-- Keyframes -->
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <!-- Main -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Quiz Css -->
    <link rel="stylesheet" href="assets/css/quiz.css">
    <!-- Media Css -->
    <link rel="stylesheet" href="assets/css/media.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>


    <header id="idstart">
        <div class="social">
            <a href="https://github.com/MushvigShukurov" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.instagram.com/mushvigsh/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCv1cilRYda9e8_07YWn4pIg" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://twitter.com/mushvi9"><i class="fab fa-twitter" target="_blank"></i></a>
        </div>
        <div class="header">
            Shukurov Mushvig
        </div>

    </header>
    <div id="quiz" style="position: relative;">
        <div class="returnBack">
            <a href="index.php" id="end">&#127747;&nbsp;Əsas Səhifə</a>
        </div>
        <?php if (!isset($_POST['checkAnswer']) && !isset($puan)) {  ?>
            <form action="" method="POST">
                <?php foreach ($suallar as $index => $sual) : ?>

                    <ul>
                        <li class="sualBasliq">
                            <span>Sual : <?= $index + 1 ?></span>
                            <h3><?= $sual['header'] ?></h3>
                        </li>
                        <li>
                            <input type="radio" value="a" name="question<?= $sual['id'] ?>" id="question<?= $sual['id'] ?>1" required>
                            <label for="question<?= $sual['id'] ?>1"><?= $sual['a'] ?></label>
                        </li>
                        <li>
                            <input type="radio" value="b" name="question<?= $sual['id'] ?>" id="question<?= $sual['id'] ?>2" required>
                            <label for="question<?= $sual['id'] ?>2"><?= $sual['b'] ?></label>
                        </li>
                        <li>
                            <input type="radio" value="c" name="question<?= $sual['id'] ?>" id="question<?= $sual['id'] ?>3" required>
                            <label for="question<?= $sual['id'] ?>3"><?= $sual['c'] ?></label>
                        </li>
                        <li>
                            <input type="radio" value="d" name="question<?= $sual['id'] ?>" id="question<?= $sual['id'] ?>4" required>
                            <label for="question<?= $sual['id'] ?>4"><?= $sual['d'] ?></label>
                        </li>
                        <input type="hidden" name="right<?= $index + 1 ?>" value="<?= $sual['correct'] ?>">

                    </ul>

                <?php endforeach; ?>
                <ul>
                    <li class="butonlar">
                        <button type="submit" name="checkAnswer">Yoxla</button>
                    </li>
                </ul>

                <!-- <ul>
                <li id="sualBasliq">
                    <span>311</span>
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorum aperiam repellendus atque placeat? Minus, nemo debitis ipsum minima odit repudiandae eius perferendis commodi nostrum illum.</h3>
                </li>
                <li>
                    <input type="radio" name="question1" id="question1" required>
                    <label for="question1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias totam exercitationem harum temporibus consectetur vitae deserunt.</label>
                </li>
                <li>
                    <input type="radio" name="question1" id="question2" required>
                    <label for="question2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias totam exercitationem harum temporibus consectetur vitae deserunt.</label>
                </li>
                <li>
                    <input type="radio" name="question1" id="question3" required>
                    <label for="question3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias totam exercitationem harum temporibus consectetur vitae deserunt.</label>
                </li>
                <li>
                    <input type="radio" name="question1" id="question4" required>
                    <label for="question4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias totam exercitationem harum temporibus consectetur vitae deserunt.</label>
                </li>
                <li id="butonlar">
                    <button type="submit" name="Yoxla">Yoxla</button>
                    <button type="submit" name="Next">Sonrakı</button>
                </li>
            </ul> -->
            </form>
        <?php
        } else {
            if (isset($puan)) {
                echo "<div class='alert'>Maksimum Puan : $maxPuan</div>";
                echo "<br><br>";
                echo "<b style='color:darkgreen;padding:3px 5px;background:#fff;border-radius:3px;'>Puanınız : " . $puan * 10 . " </b>";
                echo "<br><br>";
                echo "<b style='color:darkgreen;padding:3px 5px;background:#fff;border-radius:3px;'>Düz cavab sayı : " . $puan . " </b>";
                echo "<br><br>";
                echo "<b style='color:darkgreen;padding:3px 5px;background:#fff;border-radius:3px;'>Sehv cavab Sayı : " . $sualSayi - $puan . " </b>";
            }
        };
        echo "<br><br><br>";
        ?>
        <footer style="position: absolute;bottom:-20px;">
            <i class="far fa-copyright"></i> Ustablogger.com üçün yazdım
        </footer>
    </div>


    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Js -->
    <script src="assets/js/app.js"></script>

</body>

</html>