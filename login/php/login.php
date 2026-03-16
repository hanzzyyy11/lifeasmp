<?php
include 'db.php';       // koneksi database
include 'captcha.php';  // verifikasi hCaptcha

$email = $_POST['email'];
$password = $_POST['password'];

// Cek user
$sql = "SELECT * FROM users WHERE email=? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        echo "Login berhasil!";
    } else {
        echo "Password salah!";
    }
} else {
    echo "Email tidak ditemukan!";
}
?>