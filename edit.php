<?php
include 'koneksi.php';
$id = $_GET['id'];

if ($_POST) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $query = "UPDATE employees SET 
              name='$name', position='$position', department='$department', 
              salary='$salary', hire_date='$hire_date' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal update.";
    }
}

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM employees WHERE id='$id'"));
if (!$data) die("Data tidak ditemukan.");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Karyawan</h1>
    <form method="post">
        <label>Nama Lengkap</label>
        <input type="text" name="name" value="<?= $data['name'] ?>" required>

        <label>Jabatan</label>
        <input type="text" name="position" value="<?= $data['position'] ?>" required>

        <label>Departemen</label>
        <input type="text" name="department" value="<?= $data['department'] ?>" required>

        <label>Gaji (Rp)</label>
        <input type="number" name="salary" value="<?= $data['salary'] ?>" required>

        <label>Tanggal Masuk</label>
        <input type="date" name="hire_date" value="<?= $data['hire_date'] ?>" required>

        <button type="submit">Update</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</div>
</body>
</html>