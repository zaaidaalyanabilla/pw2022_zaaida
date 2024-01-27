<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "akademik");
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Lakukan query UPDATE untuk mengubah data dalam tabel 'mahasiswa'
    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama',jurusan = '$jurusan', alamat = '$alamat', notelp = '$notelp', agama = '$agama', jenis_kelamin = '$jenis_kelamin' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika pengeditan berhasil, alihkan kembali ke halaman awal atau halaman lain yang diinginkan
        header('Location: admin_dosen.php'); // Ganti index.php dengan halaman yang sesuai
        exit;
    } else {
        // Jika terjadi kesalahan saat mengedit
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak sah.";
}
