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
 
 
       
       
       <div id="pre_box">
         <script src="post_status.js"></script>
          <div id="sts_error"></div>
         
          <div class="container-fluid" style="margin-top:2.70%;">
           
          <div class="row">
          <div class="col-md-4" style="background-color: #cccccc;min-height: 1100px;">
           <div class="div1">
            <label style=" text-align:center !importnat; color: white; font-size:25px;font-family: 'Lato', sans-serif; margin-top:10%;">Your Profile</label>
              </div>
            <br>
     <style>
         .div1{
             text-align: center;
         }  
         
        
              
              </style>
               
           
     <?php
   
    include_once("connection.php");
    
    
    $use = $_SESSION['user_name'];

  
    $sql = "select S.firstname,S.lastname,S.email,S.dob,S.phone, S.image FROM signup S
               WHERE S.username = '$use'";
      $rim = mysqli_query($conn,$sql);

    
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }
    
    
    while ($res = mysqli_fetch_array($rim)) {

 echo '  
                           
                                 
                                    <img style="border:2px solid black; border-radius:50%; height:150px;" class="im45 img-responsive" src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="100" width="150" class="img-thumnail" />  
                                
                            
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
             <br>
             
              </div>
            
        <?php
         
            
            
        
   
           
      }
    

      
?>
        
             
                  
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         
            
            
        
   
           
      
          </div>
          <div class="col-md-4">
          
          
       <div class="form-group">
    <h2 style="color:white;">Write your post here....</h2>
    <textarea style="margin-top:5%;" placeholder="What does your mind says now......."  class="form-control rounded-0" id="sts_box" rows="3"></textarea>
</div>
        <button style="border:none; padding:5px 20px 5px 20px; float:right;" class="btn-success" id="sts_btn">
            post  
          </button>
          <br>
            
      <div>
      <div id="feed">
         
          <div id="loader">Loading......</div>
      </div>
      
      
      
        <script type="text/javascript">
        
            $(document).ready(function(){
               $("#loader").hide();
                setInterval(function(){
                 $("#feed").load("newsfeed.php");   
                }, 1000); 
            });
      
      </script>
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
         </div>
         <div class="col-md-4" style="background-color:#33cccc; margin-top:4.5%;">
           <div class="col-md-2" style="margin-left:10%;">
            
             <table class="table table-hover">
    <thead>
      <tr>
       <th style="color:white; display:none;">Id</th>
       
        <th style="color:white;">Follow</th>
        
        <th style="color:white;">Unfollow</th>
     
       
      </tr>
                 </thead>
      
      <?php
               include_once("connection.php");
         
             $use = $_SESSION['user_name'];
             
             $sql = "SELECT S.fid,S.follower FROM flom S WHERE follow='$use' AND S.follower NOT IN (
  SELECT T.follower
  FROM flom T
  WHERE T.follower='$use') ";
             $rim = mysqli_query($conn,$sql);
       
?>
            
 
        
        
        
        
        


    <?php

      while ($res = mysqli_fetch_array($rim)) {

             ?>
               <tbody>
              <tr>
              
              <td style="display:none;"><?php echo $res['fid']; ?></td>
              <td><?php echo $res['follower']; ?></td>
              <td><a  style="color:red;" href="unfollow.php?unfollow=1&fid=<?php echo $res['fid']; ?>">Unfollow</a></td>

            
              

              </tr>
              </tbody>
   


             <?php


      }


    ?>

        
        
        
        
        
        
        
        
        
        
         
        
        
        
        

      
      
      
      
      
      
      

    
  </table>
         </div>
          <div class="col-md-2" style="margin-left:40%;">
            
             <table class="table table-hover">
    <thead>
      <tr>
        <th style="color:white;">Follower</th>
     
       
      </tr>
                 </thead>
      
      <?php
               include_once("connection.php");
         
             $use = $_SESSION['user_name'];
             
             $sql = "SELECT  S.follow FROM flom S WHERE follower='$use' AND S.follow NOT IN (
  SELECT T.follow
  FROM flom T
  WHERE T.follow='$use')";
             $rim = mysqli_query($conn,$sql);
        
     
      
?>
            
 
        
        
        
        
        


    <?php

      while ($res = mysqli_fetch_array($rim)) {

             ?>
               <tbody>
              <tr>
              
              <td><?php echo $res['follow']; ?></td>

            
              

              </tr>
              </tbody>
   


             <?php


      }


    ?>

        
        
        
        
        
        
        
        
        
        
         
        
        
        
        

      
      
      
      
      
      
      

    
  </table>
         </div>
       </div>
          </div>
          </div>
  
     
       
     
   </div>

 
 
    
    
      
      
    
</body>
</html>