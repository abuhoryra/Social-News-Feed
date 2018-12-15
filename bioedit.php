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
 <style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}
        </style>
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
   
   <div class="container">
     
       <div class="row">
     
           <div class="col-md-6" style="margin-top:5%;">
               <form method="post" action="#" enctype="multipart/form-data">
                  
                  
                  <?php
                   
                   include_once("connection.php");
                   
               
                     $use = $_SESSION['user_name'];
                   
                 
      $sql= "select S.firstname,S.lastname,S.dob,S.phone FROM signup S WHERE S.username='$use'"; 
        $rim= mysqli_query($conn,$sql);
                   
                    while ($res = mysqli_fetch_array($rim)) {

 
                         
                        
                        
                      
        ?>
        
        <br>
        

                        
                         <br>
                       
              
        
           <div class="form-group">
      <label for="usr">First Name:</label>
      <input name="fname" type="text" class="form-control" id="usr" value="<?php echo $res['firstname'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Last Name:</label>
      <input name="lname" type="text" class="form-control" id="pwd" value="<?php echo $res['lastname'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Date Of Birth:</label>
      <input name="dob" type="text" class="form-control" id="pwd" value="<?php echo $res['dob'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Phone Number:</label>
      <input name="phone" type="text" class="form-control" id="pwd" value="<?php echo $res['phone'];?>">
    </div>
    <button type="submit" name="sub" class="btn btn-success">Update</button>
 
            
        <?php
         
            
            
        
   
           
      }
                       
        
        
    
                     
                   
                   ?>
                  
                  
                  
                  
               <?php
                   
                      include_once("connection.php");
                   
               
                     $use = $_SESSION['user_name'];
                   
                    if(isset($_POST['sub'])){
                        
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $dob = $_POST['dob'];
                        $phone = $_POST['phone'];
                        
                                  
                        
                        $sql = "UPDATE signup SET firstname='$fname', lastname='$lname', dob='$dob', phone='$phone'
                        WHERE username='$use'";
                        
                        $tim = mysqli_query($conn,$sql);
                        echo("<meta http-equiv='refresh' content='1'>");
     
                        
                    }
                     
                   
                   
                   
                   
                   
                   ?>   
                  
                  
                  
              
                    
                   
               </form>
           </div>
           <div class="col-md-6" style="margin-top:5%;">
               <form method="post" action="#" enctype="multipart/form-data">
               
                <?php
                   
                   include_once("connection.php");
                   
               
                     $use = $_SESSION['user_name'];
                   
                 
      $sql= "select S.image FROM signup S WHERE S.username='$use'"; 
        $rim= mysqli_query($conn,$sql);
                   
                    while ($res = mysqli_fetch_array($rim)) {

 
                         
                        
                        
                        
                        echo '  
                           
                                 
                                    <img height:150px;" class="im45 img-responsive" id="image" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="200" width="250" class="img-thumnail" />  
                                
                            
                     '; 
        
        ?>
        
        <br>
        
        
           <input  name="img" onchange="showImage.call(this)" type="file"  />
                        
                         <br>
                       
              
        
           
    <button type="submit" name="submit" class="btn btn-success">Update</button>
 
            
        <?php
         
            
            
        
   
           
      }
                       
        
        
    
                     
                   
                   ?>
                  
                  <?php
                   
                   include_once("connection.php");
                   
                   $use = $_SESSION['user_name'];
                   
                   if(isset($_POST['submit'])){
                   
                   
                    $filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
                   
                   
                   
                   
                   
                   
                   
                   $sql = "UPDATE signup SET name='$filename', image='$tmpname'
                                WHERE username='$use'";
                       
                   $rim = mysqli_query($conn,$sql);
                   
        echo("<meta http-equiv='refresh' content='1'>");
                   
                   
                   
                   }
                   
                   
                   ?>
                  
                  
               
                  
               
               
               
               
               
               
               
               </form>
               
           </div>
       </div>
       </div>

   
   
   
   
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