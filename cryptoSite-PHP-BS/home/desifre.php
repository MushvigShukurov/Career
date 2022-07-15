<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:../index.php');
    exit();
}



require_once 'algorithms/functions.php';
if(isset($_POST['sezar'])){
    require_once 'algorithms/sezar.php';
    $Sezartext = FormSecurity($_POST['sezarText']);
    $SezarKey  = (int) FormSecurity($_POST['sezarKey']);
    $SezarKey = abs($SezarKey);
    if(isset($SezarKey) && !empty($SezarKey)){
        $cryptSezar = Cryption($Sezartext,$SezarKey,0);
    }else {
        $cryptSezar = '';
    }
}

if(isset($_POST['reverse'])){
    $reverseText = FormSecurity($_POST['reverseText']);
    $cryptReverse = strrev($reverseText);
}
if(isset($_POST['base64'])){
    $base64Text = FormSecurity($_POST['base64Text']);
    $cryptBase64 = base64_decode($base64Text);
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
    <title>Deşifrələmə</title>
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
                            <a class="nav-link active" href="desifre.php">Deşifrələmə</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="elave.php">Əlavələr</a>
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
        <div class="containers">
            <h1>Sezar Deşifrələmə</h1>
            <form action="" method="POST" class="crypt_container">
                <div class="box">
                    <textarea name="sezarText" id="" placeholder="Mətn :"><?php if(isset($Sezartext)){echo $Sezartext; }; ?></textarea>
                    <input type="number" id="SezarKey" name="sezarKey" placeholder="Key :">
                </div>
                
                <div class="box">
                    <button name="sezar" type="submit" class="btn btn-primary">RUN</button>
                </div>
                <div class="box">
                    <textarea name="" id="" placeholder="..."><?php if(isset($cryptSezar)){echo $cryptSezar; }; ?></textarea>
                </div>
            </form>
        </div>
        <div class="containers">
            <h1>Reverse Deşifrələmə</h1>
            <form action="" method="POST" class="crypt_container">
                <div class="box">
                    <textarea name="reverseText" id="" placeholder="Mətn :"><?php if(isset($reverseText)){echo $reverseText; }; ?></textarea>
                    
                </div>
                
                <div class="box">
                    <button name="reverse" type="submit" class="btn btn-primary">RUN</button>
                </div>
                <div class="box">
                    <textarea name="" id="" placeholder="..."><?php if(isset($cryptReverse)){echo $cryptReverse; }; ?></textarea>
                </div>
            </form>
        </div>
        <div class="containers">
            <h1>Base64 Deşifrələmə</h1>
            <form action="" method="POST" class="crypt_container">
                <div class="box">
                    <textarea name="base64Text" id="" placeholder="Mətn :"><?php if(isset($base64Text)){echo $base64Text; }; ?></textarea>
                    
                </div>
                
                <div class="box">
                    <button name="base64" type="submit" class="btn btn-primary">RUN</button>
                </div>
                <div class="box">
                    <textarea name="" id="" placeholder="..."><?php if(isset($cryptBase64)){echo $cryptBase64; }; ?></textarea>
                </div>
            </form>
        </div>

    </div>



    <script src="../src/bsJs/bootstrap.min.js"></script>
</body>

</html>