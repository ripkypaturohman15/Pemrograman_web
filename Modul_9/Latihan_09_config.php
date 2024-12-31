<?php
$servername = "localhost";
$username = "root";
$password = ""; // Sesuaikan jika ada password untuk user root
$dbname = "db_alumni";

// Membuat koneksi
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>