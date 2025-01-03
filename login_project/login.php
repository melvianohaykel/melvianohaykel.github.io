<?php
session_start();
// Konfigurasi database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'login_db';
// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $username = $_POST['username'];
 $password = md5($_POST['password']); // Enkripsi password dengan MD5

 $sql = "SELECT * FROM users WHERE username = '$username' AND password =
'$password'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 $_SESSION['username'] = $username;
 header("Location: dashboard.php");
 exit();
 } else {
 echo "Username atau password salah.";
 }
}
?>
