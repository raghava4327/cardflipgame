<?php
require_once "connect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Memory Game in JavaScript</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="assets/styles.css" />
        <script src="assets/game.js" defer></script>
        </head>
    <body style="background-image:linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.5)) ,url('bg2.webp');background-size: cover;background-repeat: no-repeat;">
   
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
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
         
        </ul>
        
      </div>
    </div>
  </div>
</nav>
      
    

    
    <div class="game">
            <div class="controls">
                <button class="start">Start</button>

                <div class="stats">
                    <div class="moves">0 moves</div>
                    <div class="timer">time: 0 sec</div>
                </div>
                <div class="hints">
                    <button id="hints-btn" type="button" onclick="hints()" class="btn btn-primary "disabled >
                        Hints <span class="badge text-bg-secondary">0</span>
                       </button>
                </div>
                
                
            </div>
            <div class="board-container">
                <div class="board" data-dimension="4"></div>
                <div class="win">You won!</div>
            </div>
            <!-- <div class="reset">
              <button name="restart"><img src="reset.png"></img></button>
            </div> -->
        </div>
    </body>
</html>