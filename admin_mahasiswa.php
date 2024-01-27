<?php
include("inc_header.php");
if (!in_array("mahasiswa", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>
<h1>Halaman Mahasiswa</h1>
Selamat datang di halaman Mahasiswa
<br>
<table align="leaft" border="1" style="width: 700px;">
    <tr>
        <th bgcolor="white">No</th>
        <th bgcolor="white">Nim</th>
        <th bgcolor="white">Nama Mahasiswa</th>
        <th bgcolor="white">Jurusan</th>
        <th bgcolor="white">Alamat</th>
        <th bgcolor="white">NoTelp</th>
        <th bgcolor="white">Agama</th>
        <th bgcolor="white">jenis kelamin</th>

    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "akademik");

    function query($query)
    {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    $mahasiswas = query("SELECT * FROM mahasiswa");
    ?>


    <?php
    $no = 1;
    foreach ($mahasiswas as $mahasiswa) {
    ?>
        <tr>
            <td bgcolor="white"><?php echo $no++ ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['nim'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['nama'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['jurusan'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['alamat'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['notelp'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['agama'] ?></td>
            <td bgcolor="white"><?php echo $mahasiswa['jenis_kelamin'] ?></td>

        </tr>
    <?php } ?>
</table></br>
</div>



<script>
    feather.replace();
</script>


</body>

</html>
<?php
include("inc_footer.php");
?>