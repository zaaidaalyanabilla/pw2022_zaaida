<?php
include 'proses.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$agama = $_POST['agama'];
$jenis_kelamin = $_POST['jenis_kelamin'];



mysqli_query($penghubung, "INSERT INTO mahasiswa VALUES ('$nim','$nm_mhs','$alamat','$notelp','$agama','$jenis_kelamin',)");


header("location:index.php");
