<?php
include("connect.php");
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$aadhar = $_POST['aadhar'];

$insert = mysqli_query($connect, "insert into donor (name,phone,password,aadhar)
  values('$name', '$phone', '$password','$aadhar') ");

if ($insert) {
  echo '<script>alert("Registration successfull!");</script>';
} else {
  echo '<script>
                  alert("Registration unsuccessfull!");
              </script>';
}
