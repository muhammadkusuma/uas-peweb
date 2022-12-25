<?php
// session_start();
// if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
//     exit;
// }

require '../backend/function.php';

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
        header("Location: index.php");
    } else {
        echo "<script>
                alert('user baru gagal ditambahkan!');
            </script>";
        header("Location: register.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - PPDB</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>

                            <form class="" method="post">
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="text" id="exampleLastName" placeholder="Nama Lengkap" name="nama" required>

                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" placeholder="username" name="username" required></div>
                                <div class="mb-3">

                                    <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password" required>

                                </div>
                                <!-- <button class="btn btn-primary d-block btn-user w-100" type="submit" name="registrasi">Register
                                    Account</button> -->
                                <button class="btn btn-primary d-block btn-user w-100" type="submit" name="registrasi">Login</button>
                                <hr>
                                <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button" href="../login_php/google.php"><i class="fab fa-google"></i>&nbsp; Register with Google</a>
                                <hr>
                            </form>
                            <!-- <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center"><a class="small" href="index.php">Already have an account?
                                    Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>