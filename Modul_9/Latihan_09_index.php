<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Template</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .jumbotron-bg {
            background-image: url('fkom.jpg');
            /* URL gambar latar belakang */
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 1px 1px 2px black;
        }
    </style>
</head>

<body>

    <!-- Bagian Atas: Jumbotron dengan Latar Belakang Gambar -->
    <header class="jumbotron-bg text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Website Kami</h1>
            <p class="lead">Ini adalah contoh jumbotron dengan latar belakang gambar di bagian atas halaman.</p>
        </div>
    </header>

    <div class="container-fluid my-4">
        <div class="row">
            <!-- Bagian Kiri: Menu -->
            <?php include "Latihan_09_menu.php"; ?>

            <!-- Bagian Tengah: Artikel -->
            <main class="col-md-10">
                <article>
                    <?php
                    extract($_GET);
                    if (isset($menu)) {
                        if ($menu == "home") {
                            @include "Latihan_09_home.php";
                        } else if ($menu == "about") {
                            @include "Latihan_09_about.php";
                        } else if ($menu == "alumni") {
                            @include "Latihan_09_ralumni.php";
                        } else if ($menu == "calumni") {
                            @include "Latihan_09_calumni.php";
                        } else if ($menu == "ualumni") {
                            @include "Latihan_09_ualumni.php";
                        } else if ($menu == "bursalumni") {
                            @include "bursa_kerja.php";
                        } else if ($menu == "cari_alumni") {
                            @include "cari_alumni.php";
                        }
                    } else {
                        @include "Latihan_09_home.php";
                    }
                    ?>
                </article>
            </main>
        </div>
    </div>

    <!-- Bagian Bawah: Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Website Kami. All rights reserved.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>