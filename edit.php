<?php
$conn = mysqli_connect("localhost", "root", "", "akademik");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_array($result);

        // Form untuk mengedit data
        echo '<h2>Edit Data Mahasiswa</h2>';
        echo '<form method="post" action="update.php">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($data['id']) . '">';
        echo '<table>';
        echo '<tr><td>NIM:</td><td><input type="text" name="nim" value="' . htmlspecialchars($data['nim']) . '"></td></tr>';
        echo '<tr><td>Nama Mahasiswa:</td><td><input type="text" name="nama" value="' . htmlspecialchars($data['nama']) . '"></td></tr>';
        echo '<tr><td>Jurusan:</td><td><input type="text" name="jurusan" value="' . htmlspecialchars($data['jurusan']) . '"></td></tr>';
        echo '<tr><td>Alamat:</td><td><input type="text" name="alamat" value="' . htmlspecialchars($data['alamat']) . '"></td></tr>';
        echo '<tr><td>Notelp:</td><td><input type="text" name="notelp" value="' . htmlspecialchars($data['notelp']) . '"></td></tr>';
        echo '<tr><td>Agama:</td><td><select name="agama" required>';
        $options = ['islam', 'kristen', 'protestan', 'hindu', 'buddha', 'konghucu'];
        foreach ($options as $option) {
            $selected = ($data['agama'] == $option) ? 'selected' : '';
            echo '<option value="' . $option . '" ' . $selected . '>' . ucfirst($option) . '</option>';
        }
        echo '</select></td></tr>';
        echo '<tr><td>Jenis Kelamin:</td><td><select name="jenis_kelamin" required>';
        $genderOptions = ['pria', 'wanita'];
        foreach ($genderOptions as $gender) {
            $selected = ($data['jenis_kelamin'] == $gender) ? 'selected' : '';
            echo '<option value="' . $gender . '" ' . $selected . '>' . ucfirst($gender) . '</option>';
        }
        echo '</select></td></tr>';
        echo '</table>';
        echo '<br>';
        echo '<input type="submit" value="Simpan">';
        echo '</form>';
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}

mysqli_close($conn);
