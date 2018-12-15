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
   
   
   
     
         <div class="container" style="background-color:white; margin-top:10%;">
             
             <table class="table"  id="table">


   	<tr>
   		<th>Profile Picture</th>
 
   		<th>Name</th>
   		
   		
   		
   		
     
   		
   	</tr>

    <?php
        include_once("connection.php");
                 $use = $_SESSION['user_name'];
             
             $sql = "SELECT S.image,S.username FROM signup S WHERE S.username NOT IN (
  SELECT T.username
  FROM signup T
  WHERE T.username='$use')";
             $rim = mysqli_query($conn,$sql);
                 
          
             
             
      while ($res = mysqli_fetch_array($rim)) {

             ?>

              <tr>
              
              <td><?php echo'
               <img style="height:40px; width:40px;"  src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="100" width="150" class="img-thumnail" />  
     ';
    ?></td>  
              
              <td><?php echo $res['username']; ?>
               </td>
                         
                          <?php
                          
           if(isset($_POST['submit'])){
               
               $follower = $_POST['follower'];
               
             $sql = "INSERT IGNORE INTO flom(follow,follower) 
                         VALUES('$use','$follower')";
             $res = mysqli_query($conn,$sql);
           }
            
           
               
              
                  
                  
                  ?>
              
              <td>
            
              </td>
           
             
              
             

              </tr>
              
   


             <?php
                  
               

      }


    ?>


             
             </table> 
             
              </div>
   
   
   
           <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
           
       <script type="text/javascript">
          function select(){
                var rIndex,table = document.getElementById('table');
                
                for(var i = 0; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                      rIndex = this.rowIndex;
                       
                        
                   // console.log(this.cells[1]);
                       document.getElementById("km").value=this.cells[1].innerHTML;
                      
                    };
                
                }
          }
           select();
         </script>
           
           
 <div class="div1" style="text-align:center;">
   <form method="post">
<input id="km" name="follower">
    <button name="submit" type="submit" class="btn btn-primary">Follow</button>
  </form>
   </div>
     
   
   
    </body>
</html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
 