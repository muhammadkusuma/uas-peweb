<?php
session_start(); // Start session nya
// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if (isset($_SESSION['username'])) { // Jika session username ada berarti dia sudah login
    header('location: welcome.php'); // Kita Redirect ke halaman welcome.php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - PPDB</title>
    <link rel="stylesheet" href="../login_php/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../login_php/assets/css/Nunito.css">
    <link rel="stylesheet" href="../login_php/assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;../login_php/assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <?php
                                    // Cek apakah terdapat cookie dengan nama message
                                    if (isset($_COOKIE["message"])) { // Jika ada
                                    ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            // Tampilkan pesannya
                                            echo $_COOKIE["message"];
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <form class="user" method="post" action="../login_php/login.php">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="text" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username" name="username" required>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox"
                                                        id="formCheck-1">
                                                    <label class="form-check-label custom-control-label"
                                                        for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr>
                                        <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" href="../login_php/google.php">
                                            <i class="fab fa-google"></i>&nbsp; Login or Signup with Google</a>
                                        <!-- <a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button">
                                            <i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a> -->
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot
                                            Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an
                                            Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../login_php/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../login_php/assets/js/bs-init.js"></script>
    <script src="../login_php/assets/js/theme.js"></script>
</body>

</html>