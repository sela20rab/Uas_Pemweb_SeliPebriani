<?php
session_start();

$conn = new mysqli("localhost", "root", "", "uas_pemweb");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($query->num_rows > 0) {
        $_SESSION['email'] = $email; // Set session
        header("Location: index.php"); // Redirect ke halaman index
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f8e9f8, #e3d0e8);
            color: #4e2677;
            font-family: Arial, sans-serif;
        }
        .login-card {
            max-width: 1000px;
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="login-card">
            <h2 class="text-center">Login</h2>
            <form action="" method="POST" class="mt-4">
                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php } ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
