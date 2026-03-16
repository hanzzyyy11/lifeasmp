<?php
session_start();

$secret = getenv("HCAPTCHA_SECRET");
$sitekey = getenv("HCAPTCHA_SITEKEY");

// Ambil input dari form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$token = $_POST['h-captcha-response'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

// --- Fungsi verifikasi hCaptcha ---
function verifyToken(string $token, string $ip, string $secret, string $sitekey): array {
    $payload = http_build_query([
        "secret" => $secret,
        "response" => $token,
        "remoteip" => $ip,
        "sitekey" => $sitekey,
    ]);

    $ctx = stream_context_create([
        "http" => [
            "method" => "POST",
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "content" => $payload,
            "timeout" => 5,
        ],
    ]);

    $raw = file_get_contents("https://api.hcaptcha.com/siteverify", false, $ctx);
    $j = json_decode($raw, true);

    if (!empty($j["success"])) {
        return [true, []];
    }
    return [false, $j["error-codes"] ?? []];
}

list($validCaptcha, $errors) = verifyToken($token, $ip, $secret, $sitekey);

if(!$validCaptcha){
    die("CAPTCHA gagal! Error: ".implode(", ", $errors));
}

// Dummy login
if($email === "admin@localhost" && $password === "admin123"){
    $_SESSION['user_email'] = $email;
    header("Location: ../home.html");
    exit;
} else {
    die("Email atau password salah!");
}
?>