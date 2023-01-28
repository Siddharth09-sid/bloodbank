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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/favicon.ico">
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
  <link rel="manifest" href="./favicon_io/site.webmanifest">
  <script src="../script.js"></script>
  <title>Signup</title>
</head>

<body>
  <div class="isolate bg-white">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
      <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" xmlns="http://www.w3.org/2000/svg">
        <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
        <defs>
          <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
            <stop stop-color="#9089FC"></stop>
            <stop offset="1" stop-color="#FF80B5"></stop>
          </linearGradient>
        </defs>
      </svg>
    </div>
    <div class="px-6 pt-6 lg:px-8">
      <nav class="flex items-center justify-between" aria-label="Global">

        <div class="flex lg:hidden">
          <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <!-- Heroicon name: outline/bars-3 -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>


      </nav>
      <!-- component -->
      <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
          <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
              <span class="sr-only">Blood</span>
              <img class="h-16" src="../Photos/health-care.png" alt="">
            </a>
          </div>
          <div class="bg-white px-6 py-16 rounded shadow-md text-black w-full">

            <form method="post" action="registrationform.php" name="myForm">

              <h1 class="mb-8 text-3xl text-center">Sign up</h1>
              <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name" placeholder="Full Name" />
              <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone" placeholder="Phone number" />

              <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password" placeholder="Password" />
              <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="aadhar" placeholder="Aadhar Card" />

              <button type="submit" class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-700 focus:outline-none my-1">Create
                Account</button>

              <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                  Terms of Service
                </a> and
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                  Privacy Policy
                </a>
              </div>
          </div>
          </form>
          <div class="text-grey-dark mt-6">
            Already have an account?
            <a class="no-underline border-b border-blue text-blue hover:underline" href="./login.php">
              Log in
            </a>.
          </div>
        </div>
      </div>
</body>

</html>