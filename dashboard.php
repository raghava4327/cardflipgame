<?php 
require_once "connect.php";
session_start();
if(!isset($_SESSION['name']))
{
  header("Location: index.php");
}
$uname = $_SESSION['name'];
$sql="SELECT * from `player` where username='$uname'";

$result = $pdo->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);
$x=$_COOKIE['recent_score'];
if($row['highscore']<$_COOKIE['recent_score'])
{
  $sql="UPDATE `player` set `highscore`=$x where `username`='$uname'";
  $result=$pdo->query($sql);

$x=$_COOKIE['time'];
$y=$_COOKIE['moves'];
$sql1="UPDATE `player` set `mintime`=$x,`minmoves`=$y  where `username`='$uname'";
$result2 = $pdo->query($sql1);}
$result1 = $pdo->query($sql);
$row1 = $result1->fetch(PDO::FETCH_ASSOC);
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b2323bfd9a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>


<style>
  * {box-sizing: border-box;}
  body::before
{
    display: block;
    content:'';
    height:200px;
}
 
  .card
  {
    border-radius: 5px;
    border-color: black;
    color: rgb(0, 0, 0);


  }
  </style>



<body style="background-image:linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.5)),url('bg2.webp');background-size: cover;background-repeat: no-repeat;background-attachment:fixed;color:white">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <nav class="navbar navbar-dark  fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1 style="color:lightgreen">Flip It</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><?php echo $_SESSION['name']?></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a  class="nav-link"href="userprofile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
         
        </ul>
        
      </div>
    </div>
  </div>
</nav>
    
        <center><h2 class="text-success">DASHBOARD</h2></center>
    
    
  

       <div class="container mt-4">
    <div class="row g-5">

        <div class="col-md-4">

          <div class="card">

            <div class="card-block">
                <BR>    
                  <center>
                    <p class="card-text"> <b>Highest Score</b><p>
                  
                  <h3 class="card-text ">
                    <?php 
                  // if($_SESSION['highscore']>$row['highscore'])
                  // {
                  //   $row["highscore"]=$_SESSION["highscore"];
                  // }
                  echo $row['highscore'];?>
                  </h3></center>
                  <BR>
                  
            
            </div>

          </div>

        </div>

        <div class="col-md-4">

          <div class="card" >

            <div class="card-block">
                <br>    
                    <center>
                      <p class="card-text"> <b>Time Taken</b><p>
      
                    <h3 class="card-text"><?php echo $row["mintime"] ?></h3></center>
                    <BR>

            </div>

          </div>

        </div>

        <div class="col-md-4">

            <div class="card">

              <div class="card-block">
                <BR>    
                    <center>
                      <p class="card-text"> <b>Moves Used</b><p>
                    
                    <h3 class="card-text"><?php echo $row["minmoves"] ?></h3></center>
                    <br>

              </div>

            </div>

        </div>
  
    <br><br>
   
        
       
        <div class="card-body text-center"> <img src="https://img.icons8.com/bubbles/200/000000/trophy.png">
          <h4>LEADERBOARD</h4>
          
        </div>

    
    
        <div>
        
        <table style="color:white;"class="table">
          <thead>
            <tr>
              <hr>
              <th scope="col">SNO</th>
              <th scope="col">USERNAME</th>
              <th scope="col">SCORE</th>
              <th scope="col">TIME</th>
              <th scope="col">MOVES</th>
              
            </tr>
          </thead>
          <tbody>
            
              <?php 
              $sql1="SELECT * from player order by highscore desc";
              
              if($res=$pdo->query($sql1))
              {
                
                // if(($res->fetch(PDO::FETCH_ASSOC))>0)
                //   {
                    $i = 1;
                while($r=$res->fetch(PDO::FETCH_ASSOC))
              {
             
              $username = $r['username'];
              $score=$r['highscore'];
              $mintime=$r['mintime'];
              $minmoves=$r['minmoves'];
              if($username==$_SESSION['name'])
              {
                echo '<tr style="background: rgba(60,179, 130, 0.6);color:black;">';
                
              
              }
             else
             {

              echo '<tr style="background: rgba(0, 0, 0, 0.6);color:white;">';

             }
             echo '<th scope="row">'.$i.' </th>
             <td>'.$username.'</td>
             <td>'.$score.'</td>
             <td>'.$mintime.'</td>
             <td>'.$minmoves.'</td>
             </tr>';
             $i = $i + 1;
               
              }
             
          }
        
            else{
              echo '<tr><th scope="row">-</th>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>-</td></tr>';
            }
          
          
         
            ?>

              
            
          </tbody>
        </table>

      </div>

</body>
</html>


