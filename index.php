<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "uas_pemweb");

$result = $conn->query("SELECT * FROM beasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8e9f8;
            color: #4e2677;
            font-family: Arial, sans-serif;
        }
        
        .table {
            background-color: #fff;
            border-radius: 100px;
        }
        .btn {
            border-radius: 5px;
        }
        .btn-success {
            background-color: #7d3bb1;
            border-color: #7d3bb1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Beasiswa</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="create.php" class="btn btn-success">Tambah Data</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM Mahasiswa</th>
                    <th>Jenis Beasiswa</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nim_mahasiswa'] ?></td>
                        <td><?= $row['jenis_beasiswa'] ?></td>
                        <td><?= $row['tanggal_mulai'] ?></td>
                        <td><?= $row['tanggal_selesai'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
