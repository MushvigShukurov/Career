<?php
require_once 'dataCEK.php';
$onlyPost = [];
foreach ($newData as $data) {
    $title = $data['title'];
    $seoDestekliTitle = str_replace([' ', 'ş', 'Ş', 'ü', 'Ü', 'ə', 'Ə', 'ğ', 'Ğ', 'ö', 'Ö', 'ı', 'İ'], ['-', 's', 'S', 'u', 'U', 'e', 'E', 'g', 'G', 'o', 'O', 'i', 'I'], $title);
    if ($post === $seoDestekliTitle) {
        array_push($onlyPost, $data);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'metaTags.php';
    ?>
</head>

<body>

    <div class="container">
        <div class="navbar">
            <a href="https://instagram.com/mushvigsh/">Ustablogger.com</a>
            <ul>
                <li>
                    <a href="./" id="postRedirect">
                        <ion-icon name="return-up-back-outline"></ion-icon>&nbsp;Geri
                    </a>
                </li>
            </ul>
        </div>
        <main>
            <div class="onlyPost">
                <?php

                if (isset($onlyPost) && !empty($onlyPost)) :

                ?>
                    <div class="post">

                        <h2><?= ucfirst($onlyPost[0]['title']) ?></h2>
                        <p><?= ucfirst($onlyPost[0]['body']) ?></p>
                    </div>
                <?php
                else :
                ?>
                    <div class="postAlert">Tapılmadı..</div>
                <?php
                endif;
                ?>
            </div>
        </main>
        <footer>&copy; <span id="footer-site-name"></span>&nbsp;<span id="footer-site-year"></span></footer>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        var footerSiteName = document.getElementById('footer-site-name');
        var footerSiteYear = document.getElementById('footer-site-year');
        footerSiteName.textContent = 'Ustablogger.com';
        let now = new Date().getFullYear();
        footerSiteYear.textContent = now;
    </script>
</body>

</html>