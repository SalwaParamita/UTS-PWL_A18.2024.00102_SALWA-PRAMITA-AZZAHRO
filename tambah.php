<?php
include 'koneksi.php';

if ($_POST) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $query = "INSERT INTO employees (name, position, department, salary, hire_date) 
              VALUES ('$name', '$position', '$department', '$salary', '$hire_date')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menambah data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Tambah Karyawan Baru</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Nama Lengkap</label>
        <input type="text" name="name" required>

        <label>Jabatan</label>
        <input type="text" name="position" required>

        <label>Departemen</label>
        <input type="text" name="department" required>

        <label>Gaji (Rp)</label>
        <input type="number" name="salary" step="50000" required>

        <label>Tanggal Masuk</label>
        <input type="date" name="hire_date" required>

        <button type="submit">Simpan</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</div>
</body>
</html>