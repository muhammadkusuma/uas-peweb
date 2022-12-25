<?php
// Include file gpconfig
include_once 'gpconfig.php';
if (isset($_GET['code'])) {
    $gclient->authenticate($_GET['code']);
    $_SESSION['token'] = $gclient->getAccessToken();
    header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['token'])) {
    $gclient->setAccessToken($_SESSION['token']);
}
if ($gclient->getAccessToken()) {
    include '../backend/function.php';
    $pdo = getConnection();
    $kode_unik = unik();

    // Get user profile data from google
    $gpuserprofile = $google_oauthv2->userinfo->get();
    $nama = $gpuserprofile['given_name'] . " " . $gpuserprofile['family_name']; // Ambil nama dari Akun Google
    $email = $gpuserprofile['email']; // Ambil email Akun Google nya
    // Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
    // Jika ada, ambil id, username, dan nama dari user tersebut
    $sql = $pdo->prepare("SELECT id, username, nama, email, kode_unik FROM user WHERE email=:a");
    $sql->bindParam(':a', $email);
    $sql->execute(); // Eksekusi querynya
    // $user = $sql->fetch(); // Ambil datanya dari hasil query tadi
    $user = $sql->fetch(PDO::FETCH_ASSOC); // Ambil datanya dari hasil query tadi

    $emaildb = implode(array_slice($user, 3, 1));
    $unikdb = implode(array_slice($user, 4, 1));
    $emailgoogle = $email;
    // var_dump($unikdb);
    // var_dump($emaildb);
    if ($emaildb == $email) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;

        header("location: ../formulir.php?kode_unik=$unikdb");
        
    } else {
        if (empty($user)) { // Jika User dengan email tersebut belum ada
            // Ambil username dari kata sebelum simbol @ pada email
            $ex = explode('@', $email); // Pisahkan berdasarkan "@"
            $username = $ex[0]; // Ambil kata pertama
            // Lakukan insert data user baru tanpa password
            $level = "user";
            $sql = $pdo->prepare("INSERT INTO user(username, nama, email, level, kode_unik) VALUES(:username,:nama,:email,:level,:kode_unik)");
            $sql->bindParam(':username', $username);
            $sql->bindParam(':nama', $nama);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':level', $level);
            $sql->bindParam(':kode_unik', $kode_unik);
            // <a href="hapus.php?id=<?= $row["id"]; 
            $sql->execute(); // Eksekusi query insert
            $id = $pdo->lastInsertId(); // Ambil id user yang baru saja di insert
        } else {
            $id = $user['id']; // Ambil id pada tabel user
            $username = $user['username']; // Ambil username pada tabel user
            $nama = $user['nama']; // Ambil username pada tabel user
        }

        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;



        header("location: ../formulir.php?kode_unik=$kode_unik");
    }
} else {
    $authUrl = $gclient->createAuthUrl();
    header("location: " . $authUrl);
}
