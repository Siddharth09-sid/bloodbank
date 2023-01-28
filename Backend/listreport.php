<?php

if (
    !isset($_SESSION["loggedin"]) ||
    !$_SESSION["loggedin"] ||
    !$_SESSION["aadhar"]
) {
    echo '<script>alert("User not Authorized");</script>';
    header("location: http://localhost/Bloodbank/Backend/userpage.html");
}

include("connect.php");

$aadhar = $_SESSION["aadhar"];

$tablestring = "
    <table class=\"table-fixed\">
        <thead>
            <tr>
                <th>Bank Name</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
";

$sql = "SELECT  name, bankname, time, place, aadhar FROM blood.certificate WHERE aadhar = '" . $aadhar . "';";
$res = mysqli_query($connect, $sql);
$counter = 0;

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $counter++;
            $row = mysqli_fetch_array($res);
            $name = $row['name'];
            $bankname = $row['bankname'];
            $time = $row['time'];
            $place = $row['place'];
            $_SESSION["username"] = $name;

            $tablestring += "
                    <tr>
                        <td>" . $bankname . "</td>
                        <td>" . $time . "</td>
                        <form class=\"hidden\" id=\"form" . $counter . "\" action=\"viewreport.php\" method=\"POST\" onsubmit=\"\">
                            <input type=\"hidden\" name=\"name\" value=\"" . $name . "\">
                            <input type=\"hidden\" name=\"bankname\" value=\"" . $bankname . "\">
                            <input type=\"hidden\" name=\"time\" value=\"" . $time . "\">
                            <input type=\"hidden\" name=\"place\" value=\"" . $place . "\">
                        </form>
                        <td><input type=\"submit\" form=\"form" . $counter . "\" value=\"View\"/></td>
                    </tr>
                ";

            echo "<script>console.log('" . date_format($time, "Y/m/d H:i:s") . "')</script>";
        }
        $tablestring += "</tbody></table>";
    } else {
        echo "<script>alert('User not authorized')</script>";
        header("location: http://localhost/Bloodbank/Backend/userpage.html");
    }
} else {
    echo "<script>alert('Invalid username or password, try again')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="apple-touch-icon" sizes="180x180" href="./favicon_io/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="./favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./favicon_io/favicon-16x16.png">
<link rel="manifest" href="./favicon_io/site.webmanifest">
<link rel="stylesheet" href="style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo $tablestring ?>
</body>

</html>