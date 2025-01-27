<?php
$conn = new mysqli("localhost", "root", "", "uas_pemweb");

$id = $_GET['id'];
$sql = "DELETE FROM beasiswa WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
