<?php
session_start();
//$_SESSION['unique_id'] = $row['unique_id'];
//if the user is not logged in and what to access this page redirect the user to login chat.php
if(!isset($_SESSION['unique_id'])){
    header("location: loginchat.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
    <!--link css-->
    <link rel="stylesheet" href="style.css">
     <!--font awesome link-->
     <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/5bea88a2f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="wrapper">
        <div class="users">
            <header>
                <?php
                include "php/config.php";
                $selc = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";//selects all data of the current loggrd in user using session
                $sql = mysqli_query($conn,$selc);
                if(mysqli_num_rows($sql) > 0)
                {
                    $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <div class="content">
                    <img src="php/images/<?php echo $row['img']?>" alt="">
                    <div class="details">
                        <h3><?php echo $row['fname']. " " . $row['sname']?></h3>
                        <h4><?php echo $row['status']?></h4>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a><!--redirect the user to logout page and logout a particular user using the logout_id-->
            </header>
            <div class="search">
                <div class="search-input">
                    <input type="text"><span><i class="fa-solid fa-paper-plane"></i></span>
                </div>
                <h3>Who do yo want to chat with...?</h3>
            </div>
            <div class="users-list">
        
            </div>
        </div>
    </div>
    <script src="js/users.js"></script>
</body>

</html>