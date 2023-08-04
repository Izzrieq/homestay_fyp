<?php
    include('db_conn.php');
    $idsewaan = $_GET['idsewaan_form'];
    $sql = "select * from sewaan 
        join homestay on sewaan.norumah = homestay.norumah 
        join klien on sewaan.nokp = klien.nokp where idsewaan = $idsewaan";
    $data = mysqli_query($conn, $sql);        
	$sewaan = mysqli_fetch_array($data);
    $tarikh_masuk = date_create($sewaan['tmasuk']);
    $tarikh_keluar = date_create($sewaan['tkeluar']);
    $beza = date_diff($tarikh_masuk, $tarikh_keluar);
    $bilHari = $beza->format("%a"); 
?> 
<html>
<link rel="stylesheet" href="style/klien_senarai.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
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
                <th> Perkara </th> <th> Maklumat </th>
            </tr>           
            <tr>
                <td> Nombor KP </td>  <td> <?php echo $sewaan['nokp']; ?> </td>
            </tr>
            <tr>
                <td> Nama </td> <td> <?php echo $sewaan['namaklien']; ?> </td>
            </tr>
            <tr>
                <td> No Tel </td>  <td> <?php echo $sewaan['notel']; ?></td>
            </tr>
            <tr>
                <td> Alamat </td>  <td> <?php echo $sewaan['alamat']; ?></td>
            </tr>
            <tr>
                <td> Tarikh Masuk </td>  <td> <?php echo $sewaan['tmasuk']; ?> </td>
            </tr>
            <tr>
                <td> Tarikh Keluar </td>  <td> <?php echo $sewaan['tkeluar']; ?> </td>
            </tr>
            <tr>
                <td> Homestay </td>  <td> <?php echo $sewaan['namarumah']; ?></td>
            </tr>
            <tr>
                <td> Harga </td>  <td> <?php echo $sewaan['harga']; ?></td>
            </tr>
            <tr>
                <td> Bilangan Hari </td>  <td> <?php echo $bilHari; ?></td>
            </tr>
            <tr>
                <td> Bayaran </td>  
                <td> RM
                <?php 
                $bayaran =  $sewaan['harga']*$bilHari;    
                echo number_format($bayaran, 2);
                ?>
                </td>
            </tr>
        </table>
        <button style="background-image: url(image/printer-icon.png);" onclick="window.print()">Cetak</button>
        </center>
       
</body>
</html>
