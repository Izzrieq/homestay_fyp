<?php
include('db_conn.php');
if (isset($_POST['namarumah'])) {
    $norumah = $_POST['norumah'];
    $namarumah = $_POST['namarumah'];
    $harga = $_POST['harga'];
    $sql = "insert into homestay values ('$norumah', '$namarumah', $harga)";
    $result = mysqli_query($conn, $sql);
    if ($result)
        echo "<script>alert('Rekod berjaya ditambah')</script>";
    else
        echo "<script>alert('Rekod tidak berjaya ditambah')</script>";
    echo "<script>window.location='senarai_homestay.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/tambah_homestay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu-bar">
        <ul>
            <li><i class="fa-solid fa-house"></i><a href="home.php">Home</a></li>
            <li class="active"><i class="fa-solid fa-house-heart"></i><a href="tambah_homestay.php">Tambah Homestay</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="senarai_homestay.php">Senarai Homestay</a><i class="fa fa-angle-right"></i></li>
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
        <div class="form-tambah">
            <h3 class="homestay">TAMBAH HOMESTAY BARU</h3>
            <form action="tambah_homestay.php" method="post" class="homestay">
                <table>
                    <tr>
                        <td>Nombor Rumah</td>
                        <td>
                            <input type="text" name="norumah">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Homestay</td>
                        <td><input type="text" name="namarumah"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga"></td>
                    </tr>
                </table>
                <button style="background-image:url(image/save.png) ;" type="submit">Tambah</button>
            </form>
        </div>
    </center>
</body>

</html>