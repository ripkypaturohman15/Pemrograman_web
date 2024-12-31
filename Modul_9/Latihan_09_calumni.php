<h3>FORM DATA ALUMNI</h3>
<hr>
<?php
include 'Latihan_09_config.php'; // Memasukkan file konfigurasi untuk koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $jurusan = $_POST['jurusan'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["foto"]["tmp_name"]);

        // Validasi gambar
        if ($check !== false && in_array($check['mime'], ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'])) {
            if ($_FILES["foto"]["size"] <= 5000000) {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    $stmt = $conn->prepare("INSERT INTO alumni (nama, tahun_lulus, jurusan, foto) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("siss", $nama, $tahun_lulus, $jurusan, $target_file);
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Data berhasil ditambahkan.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                } else {
                    echo "<div class='alert alert-danger'>Terjadi kesalahan saat mengunggah file.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Ukuran file terlalu besar.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Format file tidak diizinkan.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Tidak ada file yang diunggah atau file terlalu besar.</div>";
    }
    $conn->close();
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Alumni</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>