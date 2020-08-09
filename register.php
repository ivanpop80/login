<?php 
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$email = strip_tags($_POST['email']);
		$db = mysqli_connect("localhost", "root", "", "myblogprojekt") or die ("Failed to connect");
		$query = "INSERT INTO accounts(username,password,email) VALUES('$username', '$password', '$email')";
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>Register</title>
</head>
<body>


<div class="card p-3 text-white " style="width: 36rem;">

<h1>Registrirajte se ovdje </h1>
  <div class="card-body">
    <h5 class="card-title">Ispunite registracionu formu</h5>
    <form method="post" action="register.php" >
		
	<div class="jedan">
		<label for="username">
		</label>
		<input class="form-control form-control-lg" type="text" name="username" placeholder="Korisnicko ime" id="username" required>
		<span id="username_error" class="text-danger"></span>
	</div>
	<div class="dva">	
		<label for="password">
		</label>
		<input class="form-control form-control-lg" type="password" name="password" placeholder="Password" id="password" required>
		<span id="password_error" class="text-danger"></span>
	</div>
	<div class="tri">	
		<label for="email">
		</label>
		<input class="form-control form-control-lg" type="email" name="email" placeholder="name@example.com" id="email" required>
		<br>
		<span id="email_error" class="text-danger"></span>
	<div class="form-group">
       <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LfxuLwZAAAAAFhUYW8YbLtqyT2INzgq2MxamElL"></div>
       <span id="captcha_error" class="text-danger"></span>
      </div>
	</div>

	
	
</form>
<div class="btn-group d-flex justify-content-center" role="group" aria-label="buttons">
	<input type="submit" name="submit" value="Register">
	<a href="indeks.php" input type="submit" value="Login" >
	<input type="submit" value="Login">
</div>


</div>
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
