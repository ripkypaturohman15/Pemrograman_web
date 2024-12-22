<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Tracer Alumni</h1>
        <form id="alumniForm">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="graduation_year">Tahun Lulus:</label>
            <input type="number" id="graduation_year" name="graduation_year" required>
            
            <label for="job_title">Pekerjaan:</label>
            <input type="text" id="job_title" name="job_title" required>
            
            <label for="company">Perusahaan:</label>
            <input type="text" id="company" name="company" required>
            
            <button type="submit">Tambah Alumni</button>
        </form>

        <h2>Daftar Alumni</h2>
        <table id="alumniTable">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tahun Lulus</th>
                    <th>Pekerjaan</th>
                    <th>Perusahaan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data alumni akan dimuat di sini -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            // Load data alumni
            function loadAlumni() {
                $.ajax({
                    url: "Tugas_process.php",
                    method: "GET",
                    success: function (data) {
                        $("#alumniTable tbody").html(data);
                    }
                });
            }

            // Load data ketika halaman dimuat
            loadAlumni();

            // Tambah alumni baru
            $("#alumniForm").submit(function (event) {
                event.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    url: "Tugas_process.php",
                    method: "POST",
                    data: formData,
                    success: function (response) {
                        alert(response);
                        $("#alumniForm")[0].reset();
                        loadAlumni();
                    }
                });
            });
        });
    </script>
</body>
</html>
