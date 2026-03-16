<?php
// Path ke file JSON
$file = 'users.json';

// Ambil data lama
$data = json_decode(file_get_contents($file), true);

// Ambil data dari form
$username = $_POST['username'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$platform = $_POST['platform'];

// Cek email sudah ada atau belum
foreach($data as $user){
    if($user['email'] === $email){
        die("Email sudah digunakan!");
    }
}

// Tambah user baru
$data[] = [
    'username' => $username,
    'email' => $email,
    'phone' => $phone,
    'password' => $password,
    'platform' => $platform,
    'created_at' => date('Y-m-d H:i:s')
];

// Simpan balik ke file JSON
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo "Signup berhasil!";
?>