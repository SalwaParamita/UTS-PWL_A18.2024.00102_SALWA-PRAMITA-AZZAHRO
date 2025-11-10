<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan - HRIS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>HRIS - Data Karyawan</h1>
    <a href="tambah.php" class="btn btn-primary">+ Tambah Karyawan</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th>Gaji</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = "SELECT * FROM employees ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['position'] ?></td>
            <td><?= $row['department'] ?></td>
            <td>Rp <?= number_format($row['salary'], 0, ',', '.') ?></td>
            <td><?= date('d-m-Y', strtotime($row['hire_date'])) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger" 
                   onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php
            endwhile;
        else:
        ?>
        <tr><td colspan="7" style="text-align:center;">Belum ada data karyawan.</td></tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>