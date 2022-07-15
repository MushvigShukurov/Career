<?php
require_once 'instruments/functions.php';
require_once 'instruments/settings.php';

if (isset($_GET['post'])) {
    $post = securityForm($_GET['post']);
    # Tek Posta Aid Data Cek bu deyiskene gore
    require_once 'instruments/post.php';
} else {
    require_once 'instruments/header.php';
    if (isset($_GET['about'])) {
        require_once 'instruments/about.php';
    } else {
        require_once 'instruments/posts.php';
    }


    require_once 'instruments/footer.php';
}
