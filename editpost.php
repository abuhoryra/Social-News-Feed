<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 
</head>
<body>
  <?php
    session_start();
   
    
    
    $use = $_SESSION['user_name'];

 
    
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }
    
    
   
    

      
?>


<style>
    .navbar{
      background-color:#0099cc; 
    }
    .navbar-brand{
        color: black;
    }
    ul>li>a{
        color: white;
    }
    </style>
<nav class="navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="chat.php">WoWshare</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li><a href="chat.php"><?php echo $_SESSION['user_name']; ?></a></li>
        <li><a href="user.php">Follow Users</a></li>
        <li><a href="mypost.php">My Posts</a></li>
        <li><a href="viewu.php">WowShare Users</a></li>
        <li><a href="bioedit.php">Edit Profile</a></li>
        <li><a href="#">About</a></li>
        <li><a href="pranto.php">Logout</a></li>
        
      </ul>
      
    </div>
  </div>
</nav>

<div class="div1" style="margin-top:5%;">
<?php
include_once("connection.php");
                
          
                       
            $use = $_SESSION['user_name'];
          
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }


    if(isset($_GET['view'])){
      $sql= "select firstname,lastname,username,email,dob,phone,image FROM signup WHERE username='{$_GET['username']}'"; 
        $rim= mysqli_query($conn,$sql);
        
 
    while ($res = mysqli_fetch_array($rim)) {

 echo '  
                           
                                 
                                    <img height:150px;" class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="400" width="450" class="img-thumnail" />  
                                
                            
                     '; 
        
        ?>
        <br>
        <style>
            .div2{
                text-align: center;
            }
            .im45{
                margin: 0 auto;
            }
              
              </style>
           
        <div class="div2">
        <p style="font-size:18px;"><label style="color:#0099ff; font-size:18px;">Name : </label> <?php echo $res['firstname']," ",$res['lastname'];?></p>
            <p style="font-size:18px;"><label style="color:#0099ff; font-size:18px;">Email Address : </label> <?php echo $res['email'];?></p>
            <p style="font-size:18px;"><label style="color:#0099ff; font-size:18px;">Date Of Birth : </label> <?php echo $res['dob'];?></p>
            <p style="font-size:18px;"><label style="color:#0099ff; font-size:18px;">Phone Number : </label> <?php echo $res['phone'];?></p>
              </div>
            
        <?php
         
            
            
        
   
           
      }
    

    }
?>
        
             
                  
        
    </div>
        
        
        
    </body>
</html>