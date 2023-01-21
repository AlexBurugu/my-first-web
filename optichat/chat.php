<?php
session_start();
//$_SESSION['unique_id'] = $row['unique_id'];
//if the user is not logged in and what to access this page redirect the user to login chat.php
if(!isset($_GET['user_id'])){
    header("location: loginchat.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <!--link css-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!--font awesome link-->
     <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/5bea88a2f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="wrapper">
        <div class="chat-area">
            <!--use the user_id to get the user image name and status-->
            <header>
            <?php //the receiver
                include "php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $selc = "SELECT * FROM users WHERE unique_id = {$user_id}";//selects all data of the current loggrd in user using session
                $sql = mysqli_query($conn,$selc);
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <div class="content">
                    <a href="users.php" class="back-arrow"><i class="fa-solid fa-left-long"></i></a>
                    <img src="php/images/<?php echo $row['img']?>" alt="">
                    <div class="details">
                        <h3><?php echo $row['fname']. " " . $row['sname']?></h3>
                        <h4><?php echo $row['status']?></h4>
                    </div>
                </div>
              <?php //me the sender
                include "php/config.php";
                $selc = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";//selects all data of the current loggrd in user using session
                $sql = mysqli_query($conn,$selc);
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <div class="content">
                <a href="users.php" class="back-arrow"><i class="fa-solid fa-left-long"></i></a>
                    <img src="php/images/<?php echo $row['img']?>" alt="">
                    <div class="details">
                        <h3>Me.</h3>
                        <h4><?php echo $row['status']?></h4>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="chat-box">                               

            </div>
            <form action="#" class="typing-area">
                <!--use hiddeninputs to send msg_sender+ && msg_receiver_id-->
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id?>" hidden>                
                <textarea name="message" class="input-field" placeholder="Type your message..."></textarea>                
                <span class="span"><button><i class="fa-solid fa-paper-plane"></i></button></span>
            </form>
        </div>
    </div>
<script src="js/chat.js"></script>
<script src="https://unpkg.com/picmo@latest/dist/umd/picmo.js"></script>
</body>

</html>