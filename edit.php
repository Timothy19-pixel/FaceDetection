<?php
include 'koneksi.php'; // Panggil koneksi

// Hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    header("Location: edit.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];

    mysqli_query($conn, "UPDATE mahasiswa SET Nama='$nama', NIM='$nim', Kelas='$kelas' WHERE id=$id");
    header("Location: edit.php");
}

$query ="SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Dan Hapus Data Mahasiswa</h1>
        
        <!-- Tombol Tambah Data -->
        <a href="form.php" class="btn-primary mb-3">Tambah Data</a>
        
        <!-- Tabel Data Mahasiswa -->
        <table class="table-striped table hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['Nama']; ?></td>
                    <td><?= $row['NIM']; ?></td>
                    <td><?= $row['Kelas']; ?></td>
                    <td>
                        <a href="edit.php?edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="edit.php?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<!--Form Edit data (Jika tombol Edit ditekan) -->
<?php if (isset($_GET['edit'])): ?>
<?php
    $id = $_GET['edit'];
    $record = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
    $data = mysqli_fetch_assoc($record);
?>
<h2 class="mt-5">Edit Data</h2>
<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['Nama']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['NIM']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['Kelas']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-warning">Update Data</button>
</form>
<?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>