<?php
include('db_conn.php'); 
if (isset($_POST['nokp'])) {
$nokp = $_POST['nokp'];
$namaklien = $_POST['namaklien'];
$notel = $_POST['notel'];
$alamat = $_POST['alamat'];
    $sql = "insert into klien (nokp, namaklien, notel, alamat)
    values ('$nokp', '$namaklien','$notel', '$alamat')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Berjaya mendaftar klien')</script>";
    else 
        echo "<script>alert('Tidak berjaya mendaftar')</script>";
    echo "<script>window.location = 'klien_senarai.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style/klien_senarai.css">
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
            <li class="active"><i class="fa-solid fa-users"></i><a href="#">Tambah Klien</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="klien_senarai.php">Senarai Klien</a><i class="fa fa-angle-right"></i></li>
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
    <form action="klien_insert.php" method="post" class="klien">
        <table>
            <tr>
                <td class=warna> Nombor KP </td>
                <td> <input type="text" name="nokp" placeholder="070802027234"> </td>
            </tr>
            <tr>
                <td class=warna> Nama Anda </td>
                <td> <input type="text" name="namaklien" placeholder="Ali bin Abu"> </td>
            </tr>
            <tr>
                <td class=warna> No Tel </td>
                <td> <input type="text" name="notel" placeholder="013-6732814"></td>
            </tr>
            <tr>
                <td class=warna> Alamat </td>
                <td> <input type="text" name="alamat" placeholder="IPOH, PERAK"></td>
            </tr>
        </table>
        <button style="background-image: url(image/save.png);" type="submit">Simpan</button>
    </form></center>
    
    <center>
    <button style="background-image: url(image/blue.png)"  onclick="tukar_warna(0)">Biru</button>
    <button style="background-image: url(image/green.png)" onclick="tukar_warna(1)">Hijau</button>
    <button style="background-image: url(image/red.png)" onclick="tukar_warna(2)">Merah</button>
    <button style="background-image: url(image/black.png)" onclick="tukar_warna(3)">Hitam</button>
    </center>  
    
   


<script>
    function semak() {
       var id = document.getElementById("id").value;
        if (id === "")
            alert("Sila masukkan idsewaan");
        else if (id.length > 4)
            alert("Sila masukkan id tidak lebih dari 4 aksara");
    }

    function tukar_warna(n) {
        var warna = ["Blue", "Green", "Red", "Black"];
        var teks = document.getElementsByClassName("warna");
        for (var i = 0; i < teks.length; i++)
        teks[i].style.color = warna[n];
    }
</script>
</body>
</html>