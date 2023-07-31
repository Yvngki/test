<?php include "inc/dbh.php"; ?>
<?php $id = $_GET['id'] ?>
<?php $login = mysqli_query($conn, "SELECT * FROM groups WHERE id='$id'"); ?>
<?php $row = mysqli_fetch_array($login) ?>

<?php 
$allMessage = mysqli_query($conn, "SELECT * FROM messages WHERE group_id='$id' ORDER BY created_at ASC"); 
?>
<?php 
// $message = mysqli_query($conn, "SELECT * FROM messages WHERE sender_id='$userid' AND group_id='$id' ORDER BY created_at ASC");
 ?>
<?php  ?>

<?php

// if($messages['sender_id'] == $userid){
//     $myMessages = $messages['message'];
//     var_dump($myMessages);
// }

?>
<div class="container-fluid bg-secondary" style="padding:10px 200px;height:80vh">
  <div class="card">
      <div class="card-header">
            <div class="row">
                <div class="col-9 p-2 bg-dark text-warning text-start  h5"><?php echo $row['name'] ?></div>
                <div class="col-3 p-2 text-end h5">Group Chat</div>
            </div>
      </div>
      <div class="card-body">
      <div class="container-fluid bg-light overflow-auto" style="height:60vh">
    <div class="row">
        <div class="col-12 text-center " style="font-size:10px">Group Was Created &nbsp;<?php echo $row['created_at'] ?></div>
    </div>
        <div class="row m-2 text-light">
            <?php while($groupMessages = mysqli_fetch_array($allMessage)){
                if($groupMessages['sender_id'] != $userid){
                    $others = $groupMessages['sender_id'];
                    $login = mysqli_query($conn, "SELECT * FROM users WHERE id='$others'");
                    $user = mysqli_fetch_array($login);
                    echo '        
                    <div class="col-8 p-2 text-start bg-dark rounded-2 shadow">
                        
                                <div class="col-6 text-warning" style="font-size:14px">'.$user['username'].'</div>
                                '.$groupMessages['message'].'
                       
                    </div>
                    <div class="col-4 p-1"></div>
                    <div class="col-12 p-1 text-start  text-dark" style="font-size:12px">'.$groupMessages['created_at'].'</div>
                    
                    ';  
                }else{

                    echo '        
                    <div class="col-4 p-1"></div>
                    <div class="col-8 p-2  bg-secondary rounded-2 shadow">
                        <div class="text-end text-warning" style="font-size:14px">'.$users['username'].'</div>
                       '.$groupMessages['message'].'
                    </div>
                    <div class="col-12 p-1 text-end  text-dark" style="font-size:12px">'.$groupMessages['created_at'].'</div>
                    
                    ';  
                }       
            } ?>
    
        </div>
        <div class="row-2"></div>
        <div class="row m-2 text-light" >
        <?php 
        // while($messages = mysqli_fetch_array($message)){
            //  echo '
            //  <div class="col-4"></div>
            //  <div class="col-8 p-2 bg-secondary text-end rounded-2">'.$messages['message'].'</div>
            //  <div class="col-12 p-1 text-dark text-end">'.$messages['created_at'].'</div>
            //  ';
        // } 
        ?>
        </div>   
        <div class="container-fluid" style="z-index:999; position:absolute; bottom:0px;left:0px">
            <form action="inc/sendMessage.php?groupId=<?php echo $row['id'] ?>&userId=<?php echo $userid?>" method="post">
                <div class="row p-2 g-1 mx-0 bg-light">
                    <div class="col-10">
                        <input type="text" name="message" class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="submit" name="send" class="btn btn-primary w-100">
                    </div>
                </div>
            </form> 
        </div>    
    </div>
      </div>
      <div class="card-footer">
          
      </div>
  </div>
<!-- </div> -->