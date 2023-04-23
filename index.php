<?php
require_once "connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Flip it</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    
    </head>
    <body style="background-image:url('carousel2.jpeg');background-repeat: no-repeat;background-size: cover;background:linear-gradient(toright,rgba(255, 255, 255, 0.1),rgba(225, 86, 86, 0.1),rgba(23, 128, 49, 0.1));"
        >
        <section>
            <center>
                <h1  style="font-family: 'Monoton', cursive;color:aliceblue;font-size:800%;">Flip it</h1>
            </center>
        </section>
        <div class="container p-5 m-5 " style="background-color: aliceblue;border-radius: 10px;">
            <div class="row">
                <div class="col mt-5">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="carousel1.jpeg" class="d-block w-100" height="300" alt="...">
    </div>
    <div class="carousel-item">
      <img src="carousel3.jpeg" class="d-block w-100" height="300" alt="...">
    </div>
    
  </div>
</div>               </div>
 <!--
          js for login and signup switching
        -->
        <script>
          function login()
          {
              var e=document.getElementById('loginp');
              e.hidden=false;
              var f=document.getElementById('registerp');
              f.hidden=true;
      
          }
          function register()
          {
            var e=document.getElementById('loginp');
              e.hidden=true;
              var f=document.getElementById('registerp');
              f.hidden=false;
          }
         
              </script>
               <!--
                js for login and signup switching
              -->
<!--loginpage-->
                 <div class="col" id="loginp" >
                  <p style="font-size: xx-large;">Login Details</p>
                  
                  <form method="post" action="submit.php"class="row" >
                    <div class="form-floating mb-3">
                      <div class="container">   
                         <?php
                    if(isset($_SESSION['error']))
                    {
                      $error=$_SESSION['error'];
                      echo "<p style='color:red'>$error</p>";
                      $_SESSION['error']='';
                    }
                    if(isset($_SESSION['regsuccess']))
                    {
                      $regsuccess=$_SESSION['regsuccess'];
                      echo "<p style='color:red'>$regsuccess</p>";
                      $_SESSION['regsuccess']='';
                    }

                    ?></div>
                
            
                  </div>
                  
                      <div class="form-floating mb-3">
                       
                        <input type="text" class="form-control"  name="form1_usname" id="floatingPassword" placeholder="abcdef">
                        <label for="floatingPassword">User Name</label>
                      </div>
                      <div class="form-floating mb-3">
                          
                        <input type="password" class="form-control"  name="form1_password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div><div class="col-12">
                      
                      <button class="btn btn-primary mt-3" name="form1_submit" type="submit">Login</button>
                    </div>
                    <div class="col mt-3 "> New account ? <button style="border-radius: 20px;padding-left:20px;padding-right: 20px;" type="button" 
                      id="btnSignup" class="btn btn-outline-dark" onclick="register()">Sign Up</button>
                       </div>
                       <!-- <div class="admin mt-3" style="font-weight:bold;">
                        For admin login
                        <button type="button" style="color:black;" class="btn btn-info"> Login here</button>
                        </div>   -->
                </form>
                 </div>


                 
                 <!--Registration page-->
                <div class="col " hidden  id="registerp" style="display:inline-block" ><center><p style="font-size: xx-large;">Registration Form</p>
                    <form method="post" action="submit.php">
                        <div class="row mb-3"  style="margin-left:100px">
                        <div class="col md-8"  >
                          <label for="validationDefaultUsername" class="form-label">Username</label>
                          <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <input type="text"  name="form2_username"class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div></div>
                        <div class="row"  style="margin-left:100px">
                        <div class="col ml-5">
                          <div class="form-floating mb-3">
            
                        <input type="email" class="form-control"  name="form2_Email" id="floatingInput" required placeholder="name@example.com">
                        <label for="floatingInput" >Email address</label>
                      </div>
                        </div>
                        </div>
                        <div class="row"  style="margin-left:100px">
                        <div class="col">
                          <div class="form-floating mb-3">
                          
                            <input type="password" name="form2_password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                          </div>
                        </div>
                        </div></center>
                        <!-- <div class="row pt-2" style="margin-left:110px;"   >
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label  class="form-check-label" for="flexCheckDefault">
                              Agree to the terms and conditions
                            </label>
                          </div>
                        </div> -->
                        <center>
                        <div class="row-md-6 pt-2">
                          <button class="btn btn-primary" name="form2_submit"type="submit">Register</button>
                        </div>
                        <div class="row pt-3">
                            <div class="col "> Already have account ? <button style="border-radius: 20px;padding-left:20px;padding-right: 20px;" type="button" 
                             id="btnSignup" class="btn btn-outline-dark" onclick="login()">Sign in</button>
                              </div>
                            
                        </div>
                        

                    </center> 
                  
                      </form> 
                      </div>

                </div>
            </div>
       
        </div>
       
    </body>
</html>