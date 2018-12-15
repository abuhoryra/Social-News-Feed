<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.html"><img class="im2 img responsive" src="home-icon-blue-png-5.png">Home</a>
  <a href="login.php"><img class="im2 img responsive" src="Man.png">Login</a>
  <a href="signup.php"><img class="im2 img responsive" src="addnew.png">SignUp</a>
  <a href="#"><img class="im2 img responsive" src="info.png">About</a>
  <a href="#"><img class="im2 img responsive" src="version.png">Version</a>
</div>


<div id="main">
  
  <span style="font-size:30px;cursor:pointer;color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container">
      <div class="jumbroton">
        <img class="im1 img-responsive" src="Man.png">
         <form method="post">
    <div class="form-group">
      <label for="usr">Userename:</label>
      <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn1 btn-success" name="sub">Login</button>
  </form>         
      </div>
  </div>
  
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
   
   
   
   
   <?php
        include_once("connection.php");
        
        session_start();
        
        if(isset($_POST['sub'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
           
            
            $sql = "SELECT username,password,image FROM signup
                           WHERE username='$user' AND password='$pass'";
            
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            
            if($count == 1){
                $_SESSION['user_name']=$user;
               
                  
               
                header('location: chat.php');
            }
            
            else{
               echo"<script>swal({
                    title: 'Username or Password is Incorrect',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }
            
        }
        
        
        
        
        ?>
   
   
   
   
   
   
   
   
   
    </body>
</html>