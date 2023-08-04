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
            <li class="active"><i class="fa-solid fa-folders"></i><a href="#">Senarai sewaan</a>
                <div class="sub-menu-1">
                    <ul>
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
    <th>Homestay</th>
    <th>Tarikh Masuk</th>
    <th>Tarikh Keluar</th>  
    <th>Bil Hari</th>
    <th>Nama</th>
    <th>Operasi</th>
  </tr>
  <?php
    // setting tarikh dan masa mengikut zon
    date_default_timezone_set("Asia/Kuala_Lumpur");
    include('db_conn.php');
    $bil = 1; 
    // cantumkan semua table
    $sql = "select * from sewaan 
    join homestay on sewaan.norumah = homestay.norumah 
    join klien on sewaan.nokp = klien.nokp";
    
    $data = mysqli_query($conn, $sql);        
	while ($sewaan = mysqli_fetch_array($data)) {
		$tarikh_masuk = date_create($sewaan['tmasuk']);
		$tarikh_keluar = date_create($sewaan['tkeluar']);
		$beza = date_diff($tarikh_masuk, $tarikh_keluar);
		$bilHari = $beza->format("%a"); // mencari bilangan hari	
    ?>
      <tr>
        <td><?php echo $bil ?></td>
        <td><?php echo $sewaan['namarumah']; ?></td>
        <td><?php echo date("d/m/y", strtotime($sewaan['tmasuk'])); ?></td>
        <td><?php echo date("d/m/y", strtotime($sewaan['tkeluar'])); ?></td>                 
        <td><?php echo $beza->format("%a"); ?></td>
        <td><?php echo $sewaan['namaklien']; ?></td>
        <td>
           <a href="sewaan_delete.php?idsewaan_form=<?php echo $sewaan['idsewaan'];?>">
           <img src="image/delete.png">
           </a>
           <a href="sewaan_cetak.php?idsewaan_form=<?php echo $sewaan['idsewaan'];?>">
           <img src="image/printer-icon.png">
           </a>
        </td>
      </tr>
      <?php
        $bil = $bil + 1; 
      } //while
      ?>
</table>
</center>

</body>
</html>