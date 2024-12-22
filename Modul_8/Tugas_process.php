<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracter_alumni";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Handle GET request untuk menampilkan data alumni
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM alumni ORDER BY id DESC");
    $output = "";

    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
            <td>{$row['name']}</td>
            <td>{$row['graduation_year']}</td>
            <td>{$row['job_title']}</td>
            <td>{$row['company']}</td>
        </tr>";
    }
    echo $output;
    exit;
}

// Handle POST request untuk menambahkan data alumni
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $graduation_year = $conn->real_escape_string($_POST['graduation_year']);
    $job_title = $conn->real_escape_string($_POST['job_title']);
    $company = $conn->real_escape_string($_POST['company']);

    $query = "INSERT INTO alumni (name, graduation_year, job_title, company) 
              VALUES ('$name', '$graduation_year', '$job_title', '$company')";
    if ($conn->query($query) === TRUE) {
        echo "Alumni berhasil ditambahkan!";
    } else {
        echo "Error: " . $conn->error;
    }
    exit;
}
