<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
	include_once('connection.php');
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	
	$sql = "SELECT id,username,password FROM accounts where username = '$username' LIMIT 1";
	$query = mysqli_query($db, $sql);

	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[0];
		$dbusername = $row[1];
		$dbpassword = $row[2];
	}
	if($username == $dbusername && $password == $dbpassword) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $id;
		header('Location: pocetna.html');
	}
	else {
		echo "<b><i>Podaci koje ste unijeli nisu tačni. <br>Pokusajte ponovno!! </i><b>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="style.css" rel="stylesheet" type="text/css">
	<title>Log In </title>

	
	<!-- CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card p-3 text-white " style="width: 36rem;">

<h1>Dobrodošli na blog </h1>
  <div class="card-body">
    <h5 class="card-title">Prijavite se ili se registirirajte za pristup blogu</h5>
    <form method="post" action="indeks.php">
		
	<div class="jedan">
		<label for="username">
		</label>
		<input class="form-control form-control-lg" type="text" name="username" placeholder="Korisnicko ime" id="username" required>
	</div>
	<div class="dva">	
		<label for="password">
		</label>
		<input class="form-control form-control-lg" type="password" name="password" placeholder="Password" id="password" required>
	</div>
	<input type="submit" value="Login">
</form>

<br>
<p id="reg">
	<a href="register.php" input type="submit" value="Register" >
	<input type="submit" value="Register">
	
	


</div>
</div>

</body>
</html>