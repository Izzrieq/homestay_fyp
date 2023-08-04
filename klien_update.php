<?php
include('db_conn.php'); 
if(isset($_POST['nokp'])) {    
    $nokp = $_POST['nokp'];
    $namaklien = $_POST['namaklien'];
	$notel = $_POST['notel'];
    $alamat = $_POST['alamat'];
    $sql = "update klien set namaklien='$namaklien', notel='$notel', 
	alamat = '$alamat' where nokp = $nokp";
    $result = mysqli_query($conn, $sql); 
    if ($result)
        echo "<script>alert('Berjaya kemaskini')</script>";
    else 
        echo "<script>alert('Tidak berjaya kemaskini')</script>";
    echo "<script>window.location='klien_senarai.php'</script>";
}
$nokp = $_GET['nokp'];
$sql = "select * from klien where nokp = '$nokp' ";
$result = mysqli_query($conn, $sql);
while ($klien = mysqli_fetch_array($result)) {
    $namaklien = $klien['namaklien'];
    $notel = $klien['notel'];
    $alamat = $klien['alamat'];
}
?>


<html>
<link rel="stylesheet" href="style/klien_senarai.css">

<body>
    <div class="menu-bar">
        <ul>
            <li><i class="fa-solid fa-house"></i><a href="#">Home</a></li>
            <li><i class="fa-solid fa-house-heart"></i><a href="#">Homestay</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="senarai_homestay.php">Senarai Homestay</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="tambah_homestay.php">Tambah Homestay</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li class="active"><i class="fa-solid fa-users"></i><a href="#">Update Klien</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="klien_senarai.php">Senarai Klien</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="klien_insert">Tambah Klien</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li><i class="fa-solid fa-folders"></i><a href="#">Sewaan</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="sewaan_senarai.php">Senarai Sewaan</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="sewaan_insert.php">Tambah Sewaan</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li><i class="fa-regular fa-file-chart-pie"></i><a href="#">Laporan</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="laporan_pilihan.php">Laporan</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="import.html">Import Fail</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="logout.php">Logout</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <center>
        <form action="klien_update.php" method="POST" class="klien">
            <table>
                <tr>
                    <td>Nombor KP</td>
                    <td>
                        <input class="readonly" readonly type="text" name="nokp" value='<?php echo $nokp;?>'>
                    </td>
                </tr>
                <tr>
                    <td>Nama:</td>
                    <td><input type="text" name="namaklien" value="<?php echo $namaklien;?>"></td>
                </tr>
                <tr>
                    <td>No Tel:</td>
                    <td><input type="text" name="notel" value="<?php echo $notel;?>"></td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
                </tr>
            </table>
            <button style="background-image: url(image/update.png);" class="update" type="submit">Update</button>
        </form>
    </center>

</body>

</html>