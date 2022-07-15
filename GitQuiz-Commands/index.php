<?php
require_once 'php/izahlar.php';
$allTopics = [];
foreach ($array as $index => $value) {
    if ($value['name'] != '') {
        $allTopics[$index] = $value;
    }
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

    <a href="#idstart" id="backtotop">
        &#9889;
    </a>
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
    <div class="container">
        <a href="quiz.php" id="start">Quizə başla</a>
        <div class="aciqlama">
            <h3>Məqsədim</h3>
            <ul>
                <li>Git bacarıqlarımızı yoxlamaq</li>
                <li>PHP bacarıqlarımı inkişaf etdirmək</li>
                <li>İzləyicilərə yararlı proyektlər təqdim etmək</li>
                <li>Bildiklərimi bölüşmək</li>
            </ul>
            <h3>Mövzular :</h3>
            <div class="allTopics">

                <?php
                foreach ($allTopics as $index => $topic) {
                ?>
                    <a href="#<?= $index ?>"><?= $topic['name'] ?></a>
                <?php
                }
                ?>
            </div>
            <div class="alert">
                <i class="fab fa-teamspeak"></i> Sual və təkliflərinizi sosial hesablarımdan müraciət edərək bildirə bilərsiniz!
                <br>
                <!-- <i class="far fa-grin-hearts"></i> Səhifəyə ümumi baxış sayı : <?= file_get_contents('saygac.txt') ?> -->
            </div>
        </div>
        <h1 class="basliq1">Git əmrləri</h1>
        <h2 class="basliq2"><i class="fab fa-git-alt"></i></h2>
        <div class="izahlar">
            <ul>
                <?php foreach ($array as $key => $value) : ?>
                    <?php if (isset($value['name']) && $value['name'] != '') : ?>
                        <li id="<?= $key ?>">

                            <h4><?= strtolower($value['name']) ?></h4>
                            <p><?= (ucfirst($value['izah'])) ?></p>
                            <?php if (isset($value['img_url']) && $value['img_url'] != '') : ?>
                                <img src="<?= $value['img_url'] ?>" alt="ustablogger.com">
                            <?php endif; ?>
                            <?php if (isset($value['ulink']) && !empty($value['ulink'])) : ?>
                                <p>Faydalı Link :<a href="<?= $value['ulink'][0] ?>" target="_blank"><?= $value['ulink'][0] ?></a></p>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <footer>
            <i class="far fa-copyright"></i> Ustablogger.com üçün yazdım
        </footer>
    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Js -->
    <script src="assets/js/app.js"></script>
    <!-- Saygac -->
    <script id="_wautds">
        var _wau = _wau || [];
        _wau.push(["dynamic", "26nmkxyo2j", "tds", "1a3447fff2cc", "small"]);
    </script>
    <script async src="//waust.at/d.js"></script>
    <script>
        $(function() {
            // Jquery Method
        });
    </script>
</body>

</html>
