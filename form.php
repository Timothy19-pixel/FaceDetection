<?php
include 'koneksi.php';

if(isset ($_POST['save'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO mahasiswa (Nama, NIM, Kelas) VALUES ('$nama', '$nim', '$kelas')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
    }else {
        echo "<script>alert('Gagal Menambahkan Data : ". mysqli_error($conn). "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Data Mahasiswa</h1>
        <form action="form.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <button type="submit" name="save" class="btn btn-primary">Tambah Data</button>
            <a href="edit.php" class="btn btn-primary mb-3">Edit Data</a>
        </form>
    </div>
</body>
</html>