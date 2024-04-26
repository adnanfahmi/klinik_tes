<?php
$servername = "127.0.0.1";
$database = "db_kesehatan";
$username = "root";
$password = "";

// Membuat koneksi

// Koneksi ke database
$koneksi = mysqli_connect("127.0.0.1", "root", "", "db_kesehatan");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user dengan username yang cocok
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    // User ditemukan, periksa password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        // Login berhasil, arahkan ke halaman dashboard
        header("Location: dashboard.html");
        exit();
    } else {
        // Password salah
        echo "Password salah";
    }
} else {
    // User tidak ditemukan
    echo "Username tidak ditemukan";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
