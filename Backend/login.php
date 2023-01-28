<?php
//This script will handle login

// check if the user is already logged in
if (isset($_SESSION['phone'])) {
    header("location: http://localhost/Bloodbank/Backend/userpage.php");
    exit;
}

require_once "connect.php";

$phone = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['phone'])) || empty(trim($_POST['password']))) {
        $err = "Please enter phone + password";
    } else {
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);
    }

    if (empty($err) && strlen($phone)) {
        $sql = "SELECT  name, phone, password, aadhar FROM blood.donor WHERE phone = \"" . $phone . "\";";
        $res = mysqli_query($connect, $sql);
        if ($res) {
            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_array($res)) {
                    if ($row['phone'] === $phone && $row['password'] === $password) {
                        echo "login successful";
                        session_start();
                        $_SESSION["username"] = $row['name'];
                        $_SESSION["phone"] = $row['phone'];
                        $_SESSION["loggedin"] = true;
                        $_SESSION["aadhar"] = $row["aadhar"];

                        header("location: http://localhost/Bloodbank/Backend/userpage.php");
                    } else {
                        echo "<script>alert('Invalid username or password, try again')</script>";
                    }
                }
            } else {
                echo "<script>alert('Invalid username or password, try again')</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password, try again')</script>";
        }
        // echo $select;
        // exit;
        // $stmt = mysqli_prepare($conn, $sql);
        // mysqli_stmt_bind_param($stmt, "s", $param_username);
        // $param_username = $email;


        // // Try to execute this statement
        // if (mysqli_stmt_execute($stmt)) {
        //     mysqli_stmt_store_result($stmt);
        //     if (mysqli_stmt_num_rows($stmt) == 1) {
        //         mysqli_stmt_bind_result($stmt, $id, $email);
        //         if (mysqli_stmt_fetch($stmt)) {
        //             // this means the password is corrct. Allow user to login
        //             session_start();
        //             $_SESSION["email"] = $email;
        //             $_SESSION["id"] = $id;
        //             $_SESSION["loggedin"] = true;

        //             //Redirect user to welcome page
        //         }
        //     }
        // }
    } else {
        echo $err;
    }
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
    <title>Login</title>
</head>

<body class="h-screen">
    <div class="isolate bg-white h-auto w-auto">
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
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Blood</span>
                        <img class="h-8" src="Photos/health-care.png" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <!-- Heroicon name: outline/bars-3 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="../Backend/adminlogin.php" class="text-sm font-semibold leading-6 text-gray-900">Admin Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>

            <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div class="w-full max-w-md space-y-8">
                    <div>
                        <a href="../index.php"><img class="mx-auto h-12 w-auto" src="../Photos/health-care.png" alt="logo"></a>
                        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your
                            account
                        </h2>
                        <p class="mt-2 text-center text-sm text-gray-600">

                            <a href="#" class="font-medium text-red-600 hover:text-red-500">Donate your Blood Today</a>
                        </p>
                    </div>
                    <form class="mt-8 space-y-6" action="login.php" method="POST" onsubmit="">
                        <input type="hidden" name="remember" value="true">
                        <div class="-space-y-px rounded-md shadow-sm">
                            <div>
                                <label for="phone" class="sr-only">Phone Number</label>
                                <input id="phone" name="phone" type="phone" autocomplete="phone" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Phone Number">
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                            </div>
                            <div class="text-sm">
                                <a href="./signup.php" class="font-medium text-red-600 hover:text-red-500">Register</a>

                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-red-600 hover:text-red-500">Forgot your
                                    password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <!-- Heroicon name: mini/lock-closed -->
                                    <svg class="h-5 w-5 text-white-500 group-hover:text-white-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>