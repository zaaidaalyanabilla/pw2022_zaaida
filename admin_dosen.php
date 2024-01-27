<?php
include("inc_header.php");
if (!in_array("dosen", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>
<h1>Halaman Dosen</h1>
Selamat datang di halaman Dosen

<!DOCTYPE html>
<html lang="en">

<?php
include 'proses.php';
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mahasiswa</title>
    <br>
    <table align="leaft" <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    </div>


    <div class="content">

        <form method="post" action="proses.php">
            <table border="2" style="width: 600px;">

                <tr>
                    <td align="center" colspan="3" bgcolor="black">
                        <font color="white" size="3px">
                            <b>Isi Data Diri Anda Di Bawah Ini Dengan Lengkap!</b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">Nim</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <input required type="text" name="nim">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">Nama Mahasiswa</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">Jurusan</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <input type="text" name="jurusan">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">Alamat</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <input type="text" name="alamat">

                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">NoTelp</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <input required type="text" name="notelp">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">Agama</td>
                    <td bgcolor="#DEDEDE">:</td>
                    <td bgcolor="#DEDEDE">
                        <select name="agama" required>
                            <option value="islam">islam</option>
                            <option value="kristen">kristen</option>
                            <option value="protestan">protestan</option>
                            <option value="hindu">hindu</option>
                            <option value="buddha">buddha</option>
                            <option value="konghucu">konghucu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#DEDEDE">jenis kelamin</td>
                    <td bgcolor="DEDEDE">:</td>
                    <td bgcolor="DEDEDE">
                        <label><input required type='radio' name='jenis_kelamin' value='pria' />Pria</label>
                        <label><input required type='radio' name='jenis_kelamin' value='wanita' />Wanita</label>

                </tr>
                <tr>
                    <td bgcolor="aliceblue"> &nbsp </td>
                    <td bgcolor="aliceblue"> &nbsp </td>
                    <td bgcolor="aliceblue">
                        <input type="submit" name="submit" value="SIMPAN">
                        <input type="reset" value="RESET">
                    </td>
                </tr>
            </table>
        </form>

        <br>
        <td align="leaft" colspan="3" bgcolor="black">
            <font color="black" size="3px">
                <table align="leaft" border="1" style="width: 800px;">
                    <tr>
                        <th bgcolor="black">
                            <font color="white">No</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Nim</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Nama Mahasiswa</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Jurusan</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Alamat</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">NoTelp</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Agama</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">jenis_kelamin</font>
                        </th>
                        <th bgcolor="black">
                            <font color="white">Aksi</font>
                        </th>
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
                        <br <td align="center" bgcolor="white">
                        <font color="black">


                            <tr>

                                <td bgcolor="#DEDEDE"><?php echo $no++ ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['nim'] ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['nama'] ?></td>
                                <td bgcolor="#DEDEDE"><?PHP echo $mahasiswa['jurusan'] ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['alamat'] ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['notelp'] ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['agama'] ?></td>
                                <td bgcolor="#DEDEDE"><?php echo $mahasiswa['jenis_kelamin'] ?></td>
                                <td bgcolor="#DEDEDE"><a href="hapus.php?id=<?php echo $mahasiswa['id']; ?>">Hapus</a> <a href="edit.php?id=<?php echo $mahasiswa['id']; ?>">Edit</a></td>

                            </tr>
                        <?php } ?>
                </table></br>
    </div>



    <script>
        feather.replace();
    </script>


</body>

</html>