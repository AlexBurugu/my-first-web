<?php
//db connection
$conn = mysqli_connect("localhost","root","","chatapp");
if(!$conn)
{
    echo "error" .mysqli_connect_error();
}