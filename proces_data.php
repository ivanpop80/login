<?php

//process_data.php

if(isset($_POST["first_name"]))
{
 $username = '';
 $password = '';
 $email = '';


 $username_error = '';
 $password_error = '';
 $email_error = '';
 $captcha_error = '';

 if(empty($_POST["username"]))
 {
  $username_error = 'Username is required';
 }
 else
 {
  $username = $_POST["username"];
 }
 if(empty($_POST["password"]))
 {
  $password_error = 'Password is required';
 }
 else
 {
  $password = $_POST["password"];
 }

 if(empty($_POST["email"]))
 {
  $email_error = 'Email is required';
 }
 else
 {
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
   $email_error = 'Invalid Email';
  }
  else
  {
   $email = $_POST["email"];
  }
 }

 

 if(empty($_POST['g-recaptcha-response']))
 {
  $captcha_error = 'Captcha is required';
 }
 else
 {
  $secret_key = '6LfxuLwZAAAAACiCM-lYIon52zuzO1todQbkgLko';

  $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

  $response_data = json_decode($response);

  if(!$response_data->success)
  {
   $captcha_error = 'Captcha verification failed';
  }
 }

 if($username_error == '' &&$password_error == '' &&  $email_error == ''   && $captcha_error == '')
 {
  $data = array(
   'success'  => true
  );
 }
 else
 {
  $data = array(
   'username_error' => $username_error,
   'password_error' => $password_error,
   'email_error'  => $email_error,
   'captcha_error'  => $captcha_error
  );
 }

 echo json_encode($data);
}

?>
