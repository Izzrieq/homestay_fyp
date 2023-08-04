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
            <li class="active"><i class="fa-solid fa-house-heart"></i><a href="#">Senarai Homestay</a>
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
    <table>
        <tr>
            <th>Nombor</th>
            <th>Nama homestay</th>
            <th>Harga sehari</th>
            <th>Operasi</th>
        </tr>
        <?php 
        $sql = "select * from homestay";
        $data = mysqli_query($conn, $sql);		    
        while ($homestay = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $homestay ['norumah']; ?></td>
            <td><?php echo $homestay ['namarumah']; ?></td>
            <td>RM <?php echo $homestay ['harga']; ?></td>
            <td>
                <a href="sewaan_update.php?norumah=<?php echo $homestay['norumah'];?>">
                    <img src=image/update.png>
                </a>
                <a href="senarai_delete.php?norumah=<?php echo $homestay['norumah'];?>">
                    <img src=image/delete.png>
                </a>
              
            </td>
        </tr>
        <?php } ?>
    </table>
    </center>
   
</body>

</html>