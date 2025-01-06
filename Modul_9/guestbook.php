<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "guestbook"); // Adjust with your DB credentials

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$action = $_GET['action'] ?? '';

if ($action === 'insert') {
    $kode = $_GET['kode'] ?? '';
    $nama = $_GET['nama'] ?? '';
    $email = $_GET['email'] ?? '';
    $pesan = $_GET['pesan'] ?? '';

    if ($kode && $nama && $email && $pesan) {
        $stmt = $conn->prepare("INSERT INTO buku_tamu (kode, nama, email, pesan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $kode, $nama, $email, $pesan);

        if ($stmt->execute()) {
            echo json_encode(["result" => "Guest added successfully."]);
        } else {
            echo json_encode(["error" => "Failed to insert guest."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Missing parameters."]);
    }
} elseif ($action === 'read') {
    $result = $conn->query("SELECT * FROM buku_tamu");

    $guests = [];
    while ($row = $result->fetch_assoc()) {
        $guests[] = $row;
    }

    echo json_encode($guests);
} else {
    echo json_encode(["error" => "Invalid action."]);
}

$conn->close();
?>