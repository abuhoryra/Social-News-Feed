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
        <div class="container" style="margin-top:5%;">
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-borderless">
                        <thead>
                            <tr>
                                <th style="display:none;">Id</th>
                                <th>Posts</th>
                                <th style="text-align:center;">Edit</th>

                                <th style="text-align:center;">Delete</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <?php
        include_once("connection.php");
                
          
    
             
             $sql = "SELECT S.sid,S.status FROM statuses S WHERE S.name='$use' ORDER BY S.sid DESC";
             $rim = mysqli_query($conn,$sql);
                 
          
             
             
      while ($res = mysqli_fetch_array($rim)) {

             ?>

                                    <tr>

                                        <td style="display:none;">
                                            <?php echo $res['sid']; ?>
                                        </td>

                                        <td>
                                            <?php echo $res['status']; ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="#" onclick="select()">Edit</a>
                                        </td>

                                        <td style="text-align:center;"><a style="color:red;" href="deleted.php?deleted=1&id=<?php echo $res['sid']; ?>">Delete</a>
                                        </td>









                                    </tr>




                                    <?php
                  
               

      }


    ?>










                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container" id="myDIV">
            <div class="row">
                <div class="col-md-6">
                    <form method="post">










                        <input style="display:none;" name="id" id="mm" type="text">
                        <textarea id="km" name="sts" style="text-align:left;" class="form-control rounded-0" id="sts_box" rows="9"></textarea>

                        <br>

                        <button class="btn btn-success" type="submit" name="sub">Submit</button>



                        <?php 
        
        include_once("connection.php");
        
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $sts = $_POST['sts'];
            
            $sql = "UPDATE statuses
SET status = '$sts'
WHERE sid = '$id'";
            
            $res = mysqli_query($conn,$sql);

     
            
       
            echo "<meta http-equiv='refresh' content='0'>";
            
            
        }
        
        
        
        
        
        
        
        
        ?>










                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function select() {
                var rIndex, table = document.getElementById('table');

                for (var i = 0; i < table.rows.length; i++) {
                    table.rows[i].onclick = function() {
                        rIndex = this.rowIndex;




                        document.getElementById("mm").value = this.cells[0].innerHTML;
                        document.getElementById("km").value = this.cells[1].innerHTML;

                    };

                }
            }
            select();
        </script>


</body>

</html>