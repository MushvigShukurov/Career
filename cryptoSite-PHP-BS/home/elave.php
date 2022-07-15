<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/bsCss/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- font-family: 'Poppins', sans-serif; -->
    <link rel="stylesheet" href="../src/css/me.css">
    <style>
        ol a{
            font-weight: bold;
            color: rgb(10,113,254);
        }
    </style>
    <title>Şifrələmə</title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-3 mb-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Şifrələmə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="desifre.php">Deşifrələmə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="elave.php">Əlavələr</a>
                        </li>
                    </ul>

                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="exit.php">Çıxış et</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php 
        if(isset($_SESSION['user'])):            
        ?>
        <div class="alert alert-success mb-3" role="alert">
            Welcome, <?php echo $_SESSION['user']; ?> !
        </div>
        <?php 
        endif;
        ?>
        <div>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Bootstrap Kitabxanası</div>
                        Bootstrap kitabxanasını <a href="https://getbootstrap.com/docs/5.1/getting-started/download/">Yükləyirik</a>
                    </div>
                    
                </li>   
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Sezar</div>
                        Sezar şifrələmə və ya deşifrələmə üçün funksiyanı <a href="https://ustablogger.com/sezar">Yükləyirik</a>
                    </div>
                </li>      
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Digər Şifrələmələr</div>
                        Base64 | MD5 | Reverse şifrələmələr üçün <a href="https://www.php.net/">php.net</a> -funksiya və metodlarına baxırıq.
                    </div>
                </li>            
            </ol>
        </div>





    </div>



    <script src="../src/bsJs/bootstrap.min.js"></script>
</body>

</html>