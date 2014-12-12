<?php require '../config/Database.php';

if (isset($_GET['logout'])) {
    session_start();
 session_destroy();
    $msg = urlencode("You have successfully logged out");
    header('location: ../store/index.php?logout' );   
    die(); 
}

if (isset($_POST['loginUser'])) {
 $stmt = $db->prepare("SELECT * FROM tbl_customers WHERE email_address = :email_address ");
 $stmt->bindParam("email_address",$_POST['email_address']);
 $result = $stmt->execute();

 $user = $stmt->fetch(PDO::FETCH_OBJ);
 $dbpass = $user->password;

 $pass = $_POST['password'];

 if (empty($_POST['email_address']) || empty($_POST['password'])) {
  $msg = urlencode("beide velden moeten ingevuld zijn");
  header("location: store/login.php?error=$msg");
 }

 if (password_verify($pass, $dbpass)) {
  session_start();
  $_SESSION['id'] = $user->customer_id;
  $_SESSION['email_address'] = $user->email_address;
  $_SESSION['username'] = $user->username;
  $_SESSION['password'] = $user->password;
  $_SESSION['name'] = $user->name;
  $_SESSION['last_name'] = $user->last_name;
  $_SESSION['gender'] = $user->gender;
  $_SESSION['address'] = $user->address;
  $_SESSION['zipcode'] = $user->zipcode;
  $_SESSION['phone_number'] = $user->phone_number;
  $_SESSION['news_letter'] = $user->news_letter;
  header('location: ../store/index.php?Hij werkt');    
 } else {
     echo "Password incorrect";
 }
}