<?php 
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$db = mysqli_connect("localhost", "root", "", "myblogprojekt") or die ("Failed to connect");
		$query = "INSERT INTO accounts(username,password) VALUES('$username', '$password')";
		$result = mysqli_query($db,$query);
		if($result) {
			echo "Registracija uspjesna";
			header('Location: indeks.php');
		}
		else {
			echo "Registracija nije uspjela, pokusajte ponovno";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link href="style.css" rel="stylesheet" type="text/css">	
<title>Register</title>
</head>
<body>

<div class="card p-3 text-white " style="width: 36rem;">

<h1>Registrirajte se ovdje </h1>
  <div class="card-body">
    <h5 class="card-title">Ispunite registracionu formu</h5>
    <form method="post" action="register.php">
		
	<div class="jedan">
		<label for="username">
		</label>
		<input class="form-control form-control-lg" type="text" name="username" placeholder="Korisnicko ime" id="username" required>
	</div>
	<div class="dva">	
		<label for="password">
		</label>
		<input class="form-control form-control-lg" type="password" name="password" placeholder="Password" id="password" required>
		<input type="submit" name="submit" value="Register">
	</div>
</form>

<br>
<a href="indeks.php" input type="submit" value="Login" >
<input type="submit" value="Login">


</div>
</div>

</div>
</body>
</html>