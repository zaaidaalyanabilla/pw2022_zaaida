<?php
// Melakukan koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "akademik");
// Sesuaikan dengan berkas koneksi database Anda

// Memeriksa apakah parameter ID telah diterima dari tautan 'Hapus'
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan query DELETE untuk menghapus data dari tabel 'mahasiswa'
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penghapusan berhasil, alihkan kembali ke halaman awal atau halaman lain yang diinginkan
        header('Location: admin_dosen.php'); // Ganti index.php dengan halaman yang sesuai
        exit;
    } else {
        // Jika terjadi kesalahan saat menghapus
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika parameter ID tidak ditemukan
    echo "ID tidak ditemukan";
}
