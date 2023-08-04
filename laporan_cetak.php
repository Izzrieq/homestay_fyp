<?php
include('db_conn.php');
?>
<html>
<link rel="stylesheet" href="style/senarai.css">
<link rel="stylesheet" href="style/senarai_homestay.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

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
        <table>
            <tr>
                <th>Bil</th>
                <th>Homestay</th>
                <th>Tarikh Masuk</th>
                <th>Tarikh Keluar</th>
                <th>Bil Hari</th>
                <th>Nama</th>
                <th>NoKP</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>

            <?php
    $pilihan = $_POST["pilihan"];
	$norumah = $_POST["norumah"];
	$bulan = $_POST["bulan"];
    $tahun = 2019;  //laporan untuk tahun semasa
    $senarai = array("DUMMY","JAN","FEB","MAC","APR","MEI", 
                     "JUN","JUL","OGO","SEP","OKT","NOV","DIS");
    $namabulan = $senarai[$bulan];
    $sql = "select * from sewaan 
           join homestay on sewaan.norumah = homestay.norumah 
           join klien on sewaan.nokp = klien.nokp  ";
    
    switch ($pilihan) {
        case 1 :  $syarat = ""; 
                  $tajuk = ""; break;     
        case 2 :  $syarat = "where sewaan.norumah = '$norumah' "; 
                  $tajuk = "LAPORAN MENGIKUT HOMESTAY";break;
        case 3 :  $syarat = "where MONTH(tmasuk) = $bulan or MONTH(tkeluar) = $bulan"; 
                  $tajuk = "LAPORAN BULAN $namabulan";break;
        case 4 :  $syarat = "where sewaan.norumah = '$norumah' and 
                  (MONTH(tmasuk) = $bulan or MONTH(tkeluar) = $bulan)"; 
                  $tajuk = "LAPORAN BULAN $namabulan DAN MENGIKUT HOMESTAY";break;
    }
    $bil = 1;
    $jumlah_keseluruhan = 0;
    $sql = $sql.$syarat;  // cantum
    $data = mysqli_query($conn, $sql);        
	while ($sewaan = mysqli_fetch_array($data)) {	
		$tarikh_masuk = date_create($sewaan['tmasuk']);
		$tarikh_keluar = date_create($sewaan['tkeluar']);
		$beza = date_diff($tarikh_masuk, $tarikh_keluar);
		$bilHari = $beza->format("%a"); // mencari bilangan hari
    ?>

            <tr>
                <td><?php echo $bil; ?></td>
                <td><?php echo $sewaan['namarumah']; ?></td>
                <td><?php echo date("d/m/y", strtotime($sewaan['tmasuk'])); ?></td>
                <td><?php echo date("d/m/y", strtotime($sewaan['tkeluar'])); ?></td>
                <td><?php echo $beza->format("%a"); ?></td>
                <td><?php echo $sewaan['namaklien']; ?></td>
                <td><?php echo $sewaan['nokp']; ?></td>
                <td>RM <?php echo number_format($sewaan['harga'], 2); ?></td>
                <td>RM
                    <?php 
        $jumlah_bayaran = $sewaan['harga'] * $bilHari;    
        echo number_format($jumlah_bayaran, 2); 
        $jumlah_keseluruhan = $jumlah_keseluruhan + $jumlah_bayaran;
        $bil = $bil + 1; 
        }  // while    
    ?>
                </td>
            </tr>
            <tr>
                <td colspan="8" align="right">JUMLAH KESELURUHAN</td>
                <td>RM <?php echo number_format($jumlah_keseluruhan, 2);?></td>
            </tr>
            <caption><?php echo $tajuk; ?></caption>
        </table><button style="background-image: url(image/printer-icon.png);" onclick="window.print()">Cetak</button>
    </center>
   

</body>

</html>