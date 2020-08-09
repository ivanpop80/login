<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<form action = "pocetna.html">
<div class="card">
	<button type="submit" class="btn btn-primary" name="redirect" >Vrati se na pocetnu!</button>
</div>
</form>

</body>
</html>