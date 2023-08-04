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
            <li class="active"><i class="fa-solid fa-users"></i><a href="#">Senarai Klien</a>
                <div class="sub-menu-1">
                    <ul>
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
       <th>Bil</th>
       <th>No KP</th>
       <th>Nama</th>
       <th>No Tel</th>
       <th>Alamat</th>
       <th>Operasi</th>
   </tr>
   <?php
   $sql = "select * from klien order by namaklien ASC";
   $data = mysqli_query($conn, $sql);		
   $bil = 1;          
   while ($klien = mysqli_fetch_array($data)) {
   ?>
   <tr>
      <td><?php echo $bil; ?></td>
      <td><?php echo $klien['nokp']; ?></td>
      <td><?php echo $klien['namaklien']; ?></td>
      <td><?php echo $klien['notel']; ?></td>
      <td><?php echo $klien['alamat']; ?></td>
      <td>
         <a href="klien_update.php?nokp=<?php echo $klien['nokp'];?>">
           <img src=image/update.png>
        </a>
        <a href="klien_delete.php?nokp=<?php echo $klien['nokp'];?>">
          <img src=image/delete.png>
        </a>
     </td>
  </tr>
  <?php $bil = $bil + 1; } ?>
</table>
</center>

</body>

</html>