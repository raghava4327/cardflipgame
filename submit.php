
<?php
require_once "connect.php";
session_start();
// Check if form 1 was submitted
if (isset($_POST['form1_submit'])) {
  $usname = $_POST['form1_usname'];
  $passwd=$_POST['form1_password'];

 $sql="select * from player where username='$usname' and password='$passwd'";
 $stmt=$pdo->query($sql);
 $res=$stmt->fetch(PDO::FETCH_ASSOC);


 if(!empty($res))
 {
    
  $_SESSION['name']="$usname"; 
    $_SESSION['highscore']=$res["highscore"];
  if($res['usertype']=='player')
  {
    header("Location:game.php");
  }
else
{
  header("Location:admindashboard.php");
}

 }
 else
 {
  $_SESSION['error']="Invalid username or password";
  header("Location:index.php");
 }
}

// Check if form 2 was submitted
if (isset($_POST['form2_submit'])) {
  $usname = $_POST['form2_username'];
  $email=$_POST['form2_Email'];
  $passwd=$_POST['form2_password'];
  $sql="INSERT INTO `player`(`username`, `email`, `password`) VALUES ('$usname','$email','$passwd')";
  $stmt=$pdo->query($sql);
  $_SESSION['regsuccess']="Registration successful";
  header("Location:index.php");

}
?>