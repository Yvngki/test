<?php 
// error_reporting(0);
session_start();
include "inc/dbh.php";

if(!isset($_SESSION['username'])){
    header('location:index.php');
}

$username = $_SESSION['username'];    

    $login = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $users = mysqli_fetch_array($login);
    $userid = $users['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<nav class="bg-dark p-2 d-flex justify-content-start align-items-center">
    <span><a  href="home.php?q=home" <?php if($_GET['q'] == 'home'){ echo 'class="nav-link mx-1 bg-light text-dark active"';}else{ echo 'class="nav-link mx-1 bg-light text-dark"';} ?>>My Home</a></span>    
    <span><a  href="home.php?q=groups" <?php if($_GET['q'] == 'groups'){ echo 'class="nav-link mx-1 bg-light text-dark active"';}else{ echo 'class="nav-link mx-1 bg-light text-dark"';} ?>>My Groups</a></span>
    <span><a  href="home.php?q=users" <?php if($_GET['q'] == 'users'){ echo 'class="nav-link mx-1 bg-light text-dark active"';}else{ echo 'class="nav-link mx-1 bg-light text-dark"';} ?>>Users</a></span>
    <span><a  href="home.php?q=profile" <?php if($_GET['q'] == 'profile'){ echo 'class="nav-link mx-1 bg-light text-dark active"';}else{ echo 'class="nav-link mx-1 bg-light text-dark"';} ?>>Profile</a></span>
    <span><a  href="logout.php?q=profile" <?php if($_GET['q'] == 'profile'){ echo 'class="nav-link mx-1 bg-light text-dark active"';}else{ echo 'class="nav-link mx-1 bg-light text-dark"';} ?>>Logout</a></span>
</nav>
 
    <?php if($_GET['q'] == 'home'){ ?>
        <div class="container mt-5">   
            <?php            
    $login = mysqli_query($conn, "SELECT * FROM groups");
    // $row = mysqli_fetch_array($login);

    if($groups = mysqli_num_rows($login) == 0){
        $groups = 0;
    }
  
   ?>
            <div class="row text-center">
               <div class="col-4">My Groups &nbsp;<?php echo $groups ?> <a class="text-decoration-none" href="home.php?q=newGroup">New Group</a></div>           
               <div class="col-6"></div>
               <div class="col-2">Profile</div>
            </div>
        </div>
    <?php
    }
    ?>

<?php if($_GET['q'] == 'groups'){ ?>
    <?php 
       $id = $_GET['id'];
       $login = mysqli_query($conn, "SELECT * FROM groups WHERE id='$id'");
       // $row = mysqli_fetch_array($login);
   
        if($groups = mysqli_num_rows($login) == 0){
            $groups = 'You Group exist So far ';
        }    
    ?>
    <div class="container">
        <div class="row text-center">
            <div class="col-4">My Groups</div>
            <div class="col-4"></div>
            <div class="col-4"><a href="home.php?q=newGroup">New Group</a></div>
        </div>
    </div>

<div class="container">
    <?php if(isset($groups)){ ?>
    <div class="alert-danger p-4 fs-2">No Groups Available</div>
    <?php } ?>
</div>
<?php } ?>
<div class="container">
    <table class="table table-reponsive text-center">
        <!-- <tr>
            <th>NO#</th>
            <th>Group Name</th>
        </tr> -->
    <?php while( $row = mysqli_fetch_array($login)){ ?>
    <tr>
        <td><?php echo $row['id']  ?></td>
        <td><?php echo $row['name']  ?></td>
        <td><a class="btn btn-primary" href="home.php?q=groupChat&id=<?php echo $row['id'] ?>">Send Message</a></td>
    </tr>
    <?php } ?>
    </table>  
</div>  


<?php if($_GET['q'] == 'newGroup'){ ?>
<div class="container px-4">
    <form action="inc/newGroup.php" method="POST" class="form">
       <div class="card">
           <div class="card-header">
               Create Group
           </div>
           <div class="card-body p-4">
            <div class="form-group">
                <label for="">Group Name</label>
                 <input type="text" class="form-control" name="name">
            </div>
           </div>
           <div class="card-footer text-end">
               <input type="submit" class="btn btn-primary" value="Create">
           </div>
       </div>
    </form>
</div>
<?php } ?>


<?php
if($_GET['q'] == 'groupChat'){
    include "groupChat.php";
}
?>
<?php
if($_GET['q'] == 'users'){
    include "users.php";
}
?>
    <script src="dist/js/bootstrap-bundle.js"></script>
</body>
</html>