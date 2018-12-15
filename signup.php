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
   <link rel="stylesheet" href="signup.css">
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
        <img class="im1 img-responsive" src="addnew.png">
         <form method="post" action="#" enctype="multipart/form-data">
    <div class="form-group">
      <label>First Name:</label>
      <input type="text" class="form-control" name="fname">
    </div>
    <div class="form-group">
      <label>Last Name:</label>
      <input type="text" class="form-control" name="lname">
    </div>
    <div class="form-group">
      <label>Username:</label>
      <input type="text" class="form-control" name="uname">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" name="pass">
    </div>
    <div class="form-group">
      <label>Email Address:</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label>Date Of Birth:</label>
      <input type="text" class="form-control" name="dob">
    </div>
    <div class="form-group">
      <label>Phone Number:</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <img src="" id="image" style="display:none;" height="150" width="100">
    <label>Insert Your Image</label>
    <input name="img" onchange="showImage.call(this)" type="file"/>
    <button type="submit" class="btn1 btn-success" name="submit">SignUp</button>
  </form>         
      </div>
  </div>
  
</div>

<?php

ini_set( "display_errors", 0); 
        ?>



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
        
     


        
        if(isset($_POST['submit'])){
            
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        
            
            $filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
            
            
            
            
            
            
            
            
            $sql = "INSERT INTO signup(firstname,lastname,username,password,email,dob,phone,name,image)
                                VALUES('$fname','$lname','$uname','$pass','$email','$dob','$phone','$filename','$tmpname')";
            
            $tom = "INSERT INTO flom(follow,follower)
                             VALUES('$uname','$uname')";
            
            if(empty($fname) || empty($lname) || empty($uname) || empty($pass) || empty($email) || empty($dob) || empty($phone) || empty($filename) || !in_array($ext, $array)){
                echo"<script>swal({
                    title: 'Fill Up All Field',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }
            elseif(!$res = mysqli_query($conn,$sql)){
                echo"<script>swal({
                    title: 'Enter Another Username,Password Or Phone Number',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,

                });</script>";
            }
            else{
                $res = mysqli_query($conn,$sql);
                $tim = mysqli_query($conn,$tom);
              
                echo"<script>swal({
                    title: 'Your Information Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,

                });</script>";
            }
        }

      
        ?>
   
   
   
   <script type="text/javascript">
    
    function showImage(){
        if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            
            obj.readAsDataURL(this.files[0]);
        }
    }
    
    </script>
   
   
   
    </body>
</html>