   <?php

include_once("connection.php");

 session_start();

    
$status = $_POST['s'];

if(!$status){
    echo "no status enterd";
}
else{
    $sql = "INSERT INTO statuses(status,name)
               VALUES('$status','{$_SESSION['user_name']}')";
    $res = mysqli_query($conn,$sql);
    echo "<script>$('#sts_box').val('');</script>";
}
 
       

    
?>

 

     
                  
                  
           