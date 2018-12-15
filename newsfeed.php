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
    <style>
        .divc{
            border: solid 1px white;
            margin-top: 4%;
            background-color: white;
            border-radius:10px; 
        }
        
        body{
            background-image: url(bim.jpg);
        }
    
    </style>
</head>

<body>







    <?php
      include_once("connection.php");
    

 session_start();
   
    
    
    $use = $_SESSION['user_name'];






      
      $rom="SELECT DISTINCT S.status,S.name,P.image FROM statuses S,signup P,flom T WHERE P.username=S.name AND T.follower=S.name AND T.follow='$use' ORDER BY sid DESC ";
      $rim = mysqli_query($conn,$rom);
      
      ?>

        <?php

      while ($res = mysqli_fetch_array($rim)) {

             ?>
              
               <div class="divc">
                <label style="color:#0099ff; font-size:25px; margin-left:3%; margin-top:1%;">
                
                <?php echo'
               <img style="height:40px; width:40px;"  src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="100" width="150" class="img-thumnail" />  
     ';
    ?>
                
                
                <?php echo $res['name'] ?></label>
              
                <textarea readonly style="border:none;background-color:white;" placeholder="What does your mind say now......."  class="form-control rounded-0" id="sts_box" rows="4">
                    <?php echo $res['status']; ?> </textarea>
    </div>
               

      
         
           







            <?php
          
        


      }
     
    ?>










    </body>
</html>  