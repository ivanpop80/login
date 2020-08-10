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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>	
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
	<br>
	<div class="form-group">
       <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LfxuLwZAAAAAFhUYW8YbLtqyT2INzgq2MxamElL" ></div>
       <span id="captcha_error" class="text-danger"></span>
      </div>
	<br>
	<div class="btn-group d-flex justify-content-center" >
		<input type="submit" value="Login">
</div>	
</form>
<br>
<!--	<input type="submit" value="Register" href="register.php" >
	<input type="submit" value="Register"> -->
<p class="btn-group d-flex justify-content-center">Još uvijek niste registrirani, to možete učititi  <a href="register.php"> ovdje </a></p>

	


</div>
</div>
<script>
$(document).ready(function(){

 $('#captcha_form').on('submit', function(event){
  event.preventDefault(); /* stop refreshing web page */ 
  $.ajax({
   url:"process_data.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function()
   {
    $('#register').attr('disabled','disabled');
   },
   success:function(data)
   {
    $('#register').attr('disabled', false);
    if(data.success)
    {
     $('#captcha_form')[0].reset();
     $('#username_error').text('');
     $('#password_error').text('');
     $('#email_error').text('');
     grecaptcha.reset();
     alert('Form Successfully validated');
    }
    else
    {
     $('#username_error').text(data.username_error);
     $('#password_error').text(data.password_error);
	 $('#email_error').text(data.email_error);
	 $('#captcha_error').text(data.captcha_error);
    }
   }
  })
 });

});
</script> 
</body>
</html>