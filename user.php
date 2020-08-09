<?php
session_start();
if (isset($_SESSION['id'])){
	$userId = $_SESSION['id'];
	$username = $_SESSION['username'];
}
else {
	header('Location: indeks.php');
	die();
}
?>

<link rel="stylesheet" href="style.css">

<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
	<title>Welcome user</title>
</head>
<body>
<h1>Welcome <?php echo $username; ?>. Your user Id is <?php echo $userId; ?> </h1>
<form action="logout.php">
	<input type="submit" name="logout" value="Logout"> 
</form>

</body>
</html>