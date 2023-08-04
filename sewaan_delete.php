<?php
  include('db_conn.php');
  $idsewaan = $_GET['idsewaan_form'];
  $sql = "delete from sewaan where idsewaan= $idsewaan";
  $result = mysqli_query($conn,$sql);
  if ($result)
      echo "<script>alert('Berjaya padam rekod')</script>";
else
      echo "<script>alert('Tidak berjaya padam rekod')</script>";
echo "<script>window.location='sewaan_senarai.php'</script>";
?>