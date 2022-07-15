<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
    if (isset($_POST['login'])) {
        require_once 'Php/db.php';
        require_once 'home/algorithms/functions.php';
        $email = FormSecurity($_POST['c_email']);
        $password = FormSecurity($_POST['c_password']);
        $axtar = $db->prepare("SELECT * FROM cusers WHERE c_email=?");
        $axtar->execute([$email]);
        if ($axtar) {
            $axtar = $axtar->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $axtar['c_password'])) {
                $_SESSION['user'] = $axtar['c_email'];
                header('location:home/index.php');
                exit();
            } else {
                header('location:index.php');
            }
        } else {
            header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/bsCss/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- font-family: 'Poppins', sans-serif; -->
    <link rel="stylesheet" href="src/css/me.css">
    <!-- Sehifeye basliq -->
    <title>Login Page</title>
</head>

<body>

    <!-- Login Container -->
    <div class="container_login">
        <h1 class="h3">Hesabınıza Giriş Edin</h1>
        <form action="" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="c_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="c_password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Daxil Ol</button>
        </form>
        <div class="alert alert-info" role="alert">
            Hesabınız yoxdursa <a href="register.php" id="reg_page_link">Qeydiyyat</a> səhifəsinə keçid edin !
        </div>
    </div>



    <!-- Bootstrapin Javascript kitabxanasini daxil etdim -->
    <script src="src/bsJs/bootstrap.min.js"></script>
</body>

</html>