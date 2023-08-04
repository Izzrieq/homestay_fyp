<?php
 include('db_conn.php');
 $nokp = $_GET['nokp'];
 $sql = "delete from klien where nokp= '$nokp'";
 $result = mysqli_query($conn, $sql);
 if ($result)
     echo "<script>alert('Berjaya padam rekod')</script>";
else 
   echo "<script>alert('Tidak berjaya padam rekod')</script>";
echo "<script>window.location='klien_senarai.php'</script>";
?>