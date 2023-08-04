<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
    <center>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
        <img src="image/user.png" alt="user">
        <br>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label> <br>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>User Password</label> <br>
     	<input type="password" name="password" placeholder="Password"><br>
            <br>
     	<button type="submit">Login</button>
     </form></center>
</body>
</html>