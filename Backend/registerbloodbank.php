<?php
include("connect.php");

$name = $_POST['name'];
$bank_name = $_POST['bankname'];
$place = $_POST['place'];
$username = $_POST['username'];
$password = $_POST['password'];

$insert = mysqli_query($connect, "insert into bloodbank (name,bankname,place,username,password)
 values('$name', '$bank_name', '$place', '$username','$password') ");
if ($insert) {
    echo '<script>
                    alert("Registration successfull!");
                </script>';
} else {
    echo '<script>
                    alert("Registration unsuccessfull!");
                </script>';
}
