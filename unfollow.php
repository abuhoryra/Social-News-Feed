<?php
include_once("connection.php");
                
          
                        session_start();
            $use = $_SESSION['user_name'];
          
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }


    if(isset($_GET['unfollow'])){
      $sql= "DELETE FROM flom WHERE fid='{$_GET['fid']}'"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; chat.php');
        }
    }


?>