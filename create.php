<?php
$conn = new mysqli("localhost", "root", "", "uas_pemweb");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $jenis_beasiswa = $_POST['jenis_beasiswa'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];

    $sql = "INSERT INTO beasiswa (nim_mahasiswa, jenis_beasiswa, tanggal_mulai, tanggal_selesai) VALUES ('$nim_mahasiswa', '$jenis_beasiswa', '$tanggal_mulai', '$tanggal_selesai')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f8e9f8, #e3d0e8);
            color: #4e2677;
            font-family: Arial, sans-serif;
        }
        .form-card {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: #fff;
        }
        .btn-primary {
            background-color: #7d3bb1;
            border-color: #7d3bb1;
        }
        .btn-primary:hover {
            background-color: #6a2c99;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #7d3bb1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-card">
            <h2>Tambah Data Beasiswa</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nim_mahasiswa" class="form-label">NIM Mahasiswa</label>
                    <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
                    <input type="text" class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
