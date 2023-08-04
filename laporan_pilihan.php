<?php
include('db_conn.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/senarai_homestay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><i class="fa-solid fa-house"></i><a href="home.php">Home</a></li>
            <li><i class="fa-solid fa-house-heart"></i><a href="#">Senarai Homestay</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="tambah_homestay.php">Tambah Homestay</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
            <li><i class="fa-solid fa-users"></i><a href="#">Klien</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="klien_senarai.php">Senarai Klien</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="klien_insert.php">Tambah Klien</a><i class="fa fa-angle-right"></i></li>
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
            <li class="active"><i class="fa-regular fa-file-chart-pie"></i><a href="#">Laporan</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="import.html">Import Fail</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="logout.php">Logout</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <center>
    <form action="laporan_cetak.php" method="post">
        <table>
            <tr>
                <th>Homestay</th>
                <th>Bulan</th>
                <th>Jenis Laporan</th>
            </tr>
            <tr>
                <td><select name="norumah">
                <?php
                    //masukkan nama homestay dari jadual
                    $sql = "select * from homestay";
                    $data = mysqli_query($conn, $sql);
                    while ($homestay = mysqli_fetch_array($data)) {
                      echo "<option value='$homestay[norumah]'>$homestay[namarumah]</option>";
                    }
                ?> 
                </select>
                <td><select name="bulan">
                    <?php
                        //masukkan nama bulan dalam pilihan
                        $bulan = array("Januari", "Februari", "Mac", "April", "Mei", "Jun",
                                      "Julai", "Ogos","Septembar","Oktober", "November", "Disember");
                        for($i = 0; $i < 12; $i++ ) {
                            $b = $i + 1;
                            echo "<option value = $b> $bulan[$i] </option>";
                        }
                    ?> 
                </select>
                </td>
                <td><select name="pilihan">
                    <option value=1>Semua Homestay, Semua Bulan</option>
                    <option value=2>Mengikut Homestay</option>
                    <option value=3>Mengikut Bulan</option>
                    <option value=4>Mengikut Homestay dan Bulan</option>
                    </select>
                </td>    
            </tr>
        </table>
        <button style="background-image: url(image/printer-icon.png);" type="submit">Papar</button>
    </form>
    </center>
    
</body></html>