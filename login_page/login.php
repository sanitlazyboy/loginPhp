<?php

$name = $email = $password = $number =  "";
$nameErr = $emailErr = $passwordErr = $numberErr= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["name"])){
    $nameErr = "Name is Required";
  }else{
  $name = test_input($_POST["name"]);
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }
  }
  if(empty($_POST["email"])){
    $emailErr = "Email Is Required";
  }else{
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if(empty($_POST["password"])){
    $passwordErr = "Password Is Required";
  }else{
    $password = test_input($_POST["password"]);
  }
  if(empty($_POST["number"])){
    $numberErr = "Number Is Required";
  }else{
    $number = test_input($_POST["number"]);
  }
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("common/head.php") ?>
    
<title>Sing Up</title>
<style>
  .error{
    color: red;
  }
  </style>
</head>
<body>
    <div class="container py-5">
        <h3 class="text-center">Sign Up </h3>
    <form  method ="Post" novalidate>
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name= "name" class="form-control"  placeholder="Enter Your Full Name">
    <span class="error"><?php echo $nameErr?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email"  name= "email" class="form-control"  placeholder="Enter Your Email">
    <span class="error"><?php echo $emailErr ?></span>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password">
    <span class="error"><?php echo $passwordErr?></span>
  </div>
  <div class="form-group">
    <label>Number</label>
    <input type="number" class="form-control" name="number" placeholder="Enter Your Number">
    <span class="error"><?php echo $numberErr?></span>
  </div>
  <input type= "submit" name="submit" class="btn btn-primary"></input>
</form>
    </div>
<?php include("common/script.php") ?>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $number;

?>
</body>
</html>