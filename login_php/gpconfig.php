<?php
session_start();
// Include Librari Google Client (API)
include_once 'libraries/Google_Client.php';
include_once 'libraries/contrib/Google_Oauth2Service.php';
$client_id = '188726176266-nthptsr8g0gvl0smbdhoag1rt8oggd08.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost:8080/login_php/google.php'; // Callback URL
// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
$google_oauthv2 = new Google_Oauth2Service($gclient);
?>