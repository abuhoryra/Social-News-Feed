<?php
include_once("connection.php");
                
          
                        session_start();
            $use = $_SESSION['user_name'];
          
    if($use == true){
        
    }
    
  
    else{
        header("location: login.php");
    }


    if(isset($_GET['deleted'])){
      $sql= "DELETE FROM statuses WHERE sid='{$_GET['id']}'"; 
        $rim= mysqli_query($conn,$sql);
        
        if($rim){
            header('Refresh:0; mypost.php');
        }
    }


?>