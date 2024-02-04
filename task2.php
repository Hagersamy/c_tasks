<!DOCTYPE html>
<html>
<body>
<h1>Signup</h1>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
First Name:<input type="text" name="fname"required><br>
Secound Name:<input type="text" name="sname"required><br>

Age:<input type="number"name="age"required><br>
Email:<input type="text" name="email"required><br>
Password: <input type="password" name="pass"required><br>
<button type="submit" onsubmit="<?php  echo $error?>">signup</button><br>
</form>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST") {
 
  $firstName = filter_var($_POST['fname'],FILTER_SANITIZE_STRING );
 //$firstName =htmlspecialchars($_POST['fname']);
  $secName = filter_var($_POST['sname'],FILTER_SANITIZE_STRING);
  $age = filter_var($_POST['age'],FILTER_SANITIZE_NUMBER_INT);
  $email=filter_var($_POST['email'] ,FILTER_SANITIZE_EMAIL);
  $password=filter_var ($_POST['pass'],FILTER_SANITIZE_STRING);

  if(empty($firstName))
  $error[]="error,enter your first name ";

  if(empty($secName))
  $error[]="error,enter your secound name ";
  
  if(empty($age))
  $error[]="error,enter your age ";

  if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) )
  $error[]="error, invalide email";

  /*
  if(!htmlspecialchars($_POST['email']))
  $error[]="error, invalide email";
  */
  if(empty($error))
    echo "Hi " . $firstName ." ," . $secName ." ,your age is ".$age." ,your email is ".$email ." passward: ".$password;
  else
  foreach($error as $e)
  echo $e;
  
}


?>

</body>
</html> 