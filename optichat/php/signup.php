<?php

//testing echo "hi";
session_start();
include_once "config.php";
//get user input
$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$sname = mysqli_real_escape_string($conn,$_POST['sname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$hashed = password_hash($password,PASSWORD_DEFAULT);
//validate user input
if(!empty($fname) && !empty($sname) && !empty($email) && !empty($password))
{
    //validate some inputs
    //1.email
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        //check if email already exists in the db
        $selc = "SELECT email FROM users WHERE email = '{$email}'";
        $sql = mysqli_query($conn,$selc);
        if(mysqli_num_rows($sql) > 0)//if email already exists
        {
            echo "$email already exists";
        }
        else{
            //check  what the user uploads
            if(isset($_FILES['image']))//if image is uploaded
            {
                //$_FILES['image'] return arraay of image_name,image_type,image_error,image_tmp_name
                //get image_name,image_type and image_tmp_name
                $img_name = $_FILES['image']['name'];//getting image name
                $img_type = $_FILES['image']['type'];//getting image type
                $image_tmp = $_FILES['image']['tmp_name'];//is used  to move file to our folder
                //explode image info to get last extenions
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);//here is the image extension
                //set image valid extension and store the in a array
                $extensions = ['jpg','jpeg','png'];
                //chek if the uploaded image extension matches with our array
                if(in_array($img_ext, $extensions) === true)//if image extension matches
                {
                    $time = time();//this return current time
                    //this time is needed becoz moving the image to our folder ,the image name will be renamed with the current time
                    //all images will have unique name
                    //move the uploaded image to our folder
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($image_tmp, "images/".$new_img_name));//if the image is moved to our folder
                    {$status = "Online";//change status of the user to online
                        //create a rondom id for the logged user
                        $random = rand(time(), 10000000);
                        //insert all data to out db table
                        $ins = "INSERT INTO users (unique_id, fname, sname, email, password, img, status) VALUES ('{$random}', '{$fname}', '{$sname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')";
                        $sql1 = mysqli_query($conn,$ins);
                        if($sql1)//if the data was inserted
                        {
                            //echo "success";
                            $sel1 = "SELECT * FROM users WHERE email = '{$email}'";
                            $sql2 = mysqli_query($conn,$sel1);
                            if(mysqli_num_rows($sql2) > 0)
                            {
                                $row = mysqli_fetch_assoc($sql2);
                                //same email will have the same unique id
                                //using session we  can use user unique_id in otther php files
                                $_SESSION['unique_id'] = $row['unique_id'];//remember to start session
                                echo "success"; //check ajax
                            }
                        }
                        else{
                            echo "error";
                        }
                    }
                }
                else{
                    echo "invalid image format!!!";
                }
            }
            else{
                echo "Please select your DP";
            }
        }
    }
    else{
        echo "$email is not a valid email";
    }

}
else{
    echo "All input required!!!";
}