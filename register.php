<?php
$servername = "127.0.0.1";
$database = "db_kesehatan";
$username = "root";
$password = "";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil nilai dari form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menyimpan data ke database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

if (mysqli_query($conn, $sql)) {
    // Jika registrasi berhasil, arahkan ke halaman login
    header("Location: login.html");
    exit();
} else {
    // Jika registrasi gagal, kembali ke halaman register
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: register.html");
    exit();
}

mysqli_close($conn);

?>
