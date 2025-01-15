<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validasi input
    if (empty($name) || empty($email) || empty($message)) {
        echo "Semua kolom harus diisi!";
        exit;
    }

    // Pengaturan email
    $to = "rifkypaturoman@gmail.com"; // Ganti dengan alamat email tujuan
    $subject = "Pesan dari Portofolio: $name";
    $body = "Nama: $name\nEmail: $email\nPesan: $message";
    $headers = "From: $email";

    // Mengirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Pesan gagal dikirim. Coba lagi nanti.";
    }
}
?>
