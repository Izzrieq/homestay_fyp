<?php
include('db_conn.php'); 
if (isset($_POST['nokp'])) {
	$nokp = $_POST['nokp'];
	$tarikh_masuk = $_POST['tarikh_masuk'];
	$tarikh_keluar= $_POST['tarikh_keluar'];
    $norumah = $_POST['norumah'];
    $sql = "insert into sewaan value (NULL,'$tarikh_masuk', '$tarikh_keluar', 
        '$norumah', '$nokp')";	
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Berjaya membuat tempahan')</script>";
    else 
        echo "<script>alert('Tidak berjaya membuat tempahan')</script>";
    echo "<script>window.location='sewaan_senarai.php'</script>";	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/klien_senarai.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><i class="fa-solid fa-house"></i><a href="home.php">Home</a></li>
            <li><i class="fa-solid fa-house-heart"></i><a href="#">Homestay</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="senarai_homestay.php">Senarai Homestay</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="tambah_homestay.php">Tambah Homestay</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li ><i class="fa-solid fa-users"></i><a href="#">Klien</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="klien_senarai.php">Senarai Klien</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="klien_insert.php">Tambah Klien</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li class="active"><i class="fa-solid fa-folders"></i><a href="#">Tambah sewaan</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="sewaan_senarai.php">Senarai Sewaan</a><i class="fa fa-angle-right"></i></li>
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
<form class="sewaan" action="sewaan_insert.php" method="post" >
    <table>
    <tr>
    <td>Nama Klien</td>
    <td>
        <select name="nokp">
        <option></option>
        <?php
            $sql = "select * from klien";
            $data = mysqli_query($conn, $sql);
            while ($klien = mysqli_fetch_array($data)) {
                echo "<option value='$klien[nokp]'>$klien[namaklien]</option>";		
            }
        ?>
        </select>
    </td>
    </tr>

    <tr>
    <td>Homestay</td>
    <td>
        <select name="norumah">
        <option></option>
        <?php
            $sql = "select * from homestay";
            $data2 = mysqli_query($conn, $sql);
            while ($rumah = mysqli_fetch_array($data2))   {
                echo "<option value='$rumah[norumah]'>$rumah[namarumah]</option>";		
           }
        ?>
        </select>
    </td>
    </tr>
    <tr>
        <td>Tarikh Masuk</td>
        <td><input type="date" name="tarikh_masuk"></td>
    </tr>
    <tr>
        <td>Tarikh Keluar</td>
        <td><input type="date" name="tarikh_keluar"></td>
    </tr>
</table>
<button style="background-image: url(image/Home-icon.png);" type="submit">Sewa</button>   
</form>	
    </center>
 
</body>
</html>
