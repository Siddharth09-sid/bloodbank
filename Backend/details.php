<?php
include("connect.php");

$name = $_POST['name'];
$bank_name = $_POST['bankname'];
$time = $_POST['time'];
$place = $_POST['place'];
$aadhar = $_POST['aadhar'];

$insert = mysqli_query($connect, "insert into certificate (name,bankname,time,place, aadhar)
 values('$name', '$bank_name', '$time', '$place','$aadhar') ");
if ($insert) {
    echo '<script>
                    alert("Registration successfull!");
                </script>';
} else {
    echo '<script>
                    alert("Registration unsuccessfull!");
                </script>';
}

header("location: http://localhost/Bloodbank/Backend/bloodbankuserpage.html");
exit;
