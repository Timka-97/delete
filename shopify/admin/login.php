<?php 
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="container">
<div class="row">
<div class="col">
<form class="mt-5" action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
</div>

 </div>
</div>	
	
	

	
<!--===============================================================================================-->
	

</body>
</html>

<?php 
// include "../libs/database.php";
// include "../functions.php";
// $db = new database();


// if(isset($_POST['login'])) 
// {
// 	$email = $_POST['email'];
// 	$password = $_POST['password'];
// 	$query = "SELECT * FROM admin where email='$email' and password='$password'";
// 	$user = $db->select($query);
// 	$check = $user->num_rows;
// 	if($check > 0) 
// 	{	
// 		$_SESSION['email']= $email;
// 		header("location:index.php?msg='Successfully logged in'");
// 	}
// 	else 
// 	{
// 		echo "<script>alert('Password or email is incorrect')</script>";
// 	}


// }

 ?>

<?php
  $host = '127.0.0.1';
  $db   = 'phpblog';
  $user = 'root';
  $pass = 'root';
  $charset = 'utf8';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $opt = [
	  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	  PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  $pdo = new PDO($dsn, $user, $pass, $opt);
  try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}


if(isset($_POST['login'])) 
{
	$email = $_POST['email'];
	$password = $_POST['password'];

$stmt2 = $pdo->prepare('SELECT * FROM admin where email= :email and password= :password');
$stmt2->execute(['email'=>$email,'password'=>$password]);
$check = $stmt2->rowCount();
	if($check > 0) 
	{	
		$_SESSION['email']= $email;
		header("location:index.php?msg='Successfully logged in'");
	}
	else 
	{
		echo "<script>alert('Password or email is incorrect')</script>";
	}
}

?>

 