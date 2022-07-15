<?php
if (isset($_SERVER['REQUEST_METHOD'])) {

    if (isset($_POST['register'])) {
        require_once 'Php/db.php';
        require_once 'home/algorithms/functions.php';
        $email = FormSecurity($_POST['c_email']);
        $password1 = FormSecurity($_POST['c_password']);
        $password2 = FormSecurity($_POST['c_password_2']);
        if (strlen($password1) < 8) {
            header('location:register.php');
        } else {
            if ($password1 === $password2 && !empty($email)) {
                $password1 = password_hash($password1,PASSWORD_DEFAULT);
                $save = $db->prepare("INSERT INTO cusers SET c_email=?,c_password=?");
                $save->execute([$email, $password1]);
                $ok = $save->rowCount();
                if ($ok) {
                    header('location:index.php');
                } else {
                    header('location:register.php');
                }
            } else {
                header('location:register.php');
            }
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
    <!-- Bootstrapi daxil etdim -->
    <link rel="stylesheet" href="src/bsCss/bootstrap.min.css">
    <!-- Fonts.google.com dan poppins fontunu daxil etdim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- font-family: 'Poppins', sans-serif; -->

    <!-- Oz yazdigimiz css daxil edirik -->
    <link rel="stylesheet" href="src/css/me.css">
    <title>Registr Page</title>
</head>

<body>

    <div class="container_login">
        <h1 class="h3">Hesab Yaradın</h1>
        <form action="" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="c_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">E-Mail hesabınızı güvənli şəkildə saxlayacağıq!</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="c_password" class="form-control" id="exampleInputPassword1" placeholder="min 8 character" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" name="c_password_2" class="form-control" id="exampleInputPassword2"  placeholder="min 8 character" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Qeydiyyatdan Keç</button> &nbsp; <a href="index.php" class="btn btn-primary">Daxil Ol</a>
        </form>

    </div>


    <script src="src/bsJs/bootstrap.min.js"></script>
</body>

</html>