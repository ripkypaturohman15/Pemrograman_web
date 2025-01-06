<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Name</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Search Name</h3>
        <hr>

        <form method="GET" action="">
            <div class="form-group mb-3">
                <input type="text" name="search_name" placeholder="Enter a name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <hr>

        <?php
        // Include the database configuration file
        include 'Latihan_09_config.php';

        // Get the search input
        $search_name = isset($_GET['search_name']) ? $_GET['search_name'] : '';

        // Query the database
        if ($search_name !== '') {
            $sql = "SELECT * FROM alumni WHERE nama LIKE ?";
            $stmt = $conn->prepare($sql);
            $like_name = "%" . $search_name . "%";
            $stmt->bind_param("s", $like_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table class='table table-bordered'>";
                echo "<tr><th>ID</th><th>Name</th><th>Graduation Year</th><th>Major</th><th>Photo</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["tahun_lulus"] . "</td>";
                    echo "<td>" . $row["jurusan"] . "</td>";
                    echo "<td><img src='" . $row["foto"] . "' width='50'></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='text-danger'>No results found for <strong>$search_name</strong>.</p>";
            }

            $stmt->close();
        }

        // Close the database connection
        $conn->close();
        ?>

        <hr>

        <!-- Back to Homepage Button -->
        <a href="Latihan_09_index.php" class="btn btn-secondary">Back to Homepage</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>