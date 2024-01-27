<?php
$penghubung = mysqli_connect("localhost", "root", "", "akademik");
// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jurusan = $_POST["jurusan"];
    $alamat = $_POST["alamat"];
    $notelp = $_POST["notelp"];
    $agama = $_POST["agama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];

    // Query SQL untuk menyimpan data
    $query = "INSERT INTO mahasiswa VALUES (NULL,'$nim','$nama','$jurusan','$alamat','$notelp','$agama','$jenis_kelamin')";
    $result = mysqli_query($penghubung, $query);

    if ($result) {
        // Data berhasil disimpan, arahkan kembali ke halaman formulir
        header("Location: admin_dosen.php");
        exit;
    } else {
        // kesalahan dalam menyimpan data
        echo "Terjadi kesalahan: " . mysqli_error($penghubung);
    }
}

// close the database connection
$penghubung->close();
