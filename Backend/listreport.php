<?php
session_start();
if (
    !isset($_SESSION["loggedin"]) ||
    $_SESSION["loggedin"] != 1 ||
    !isset($_SESSION["aadhar"])
) {
    echo '<script>alert("User not Authorized");</script>';
    header("location: http://localhost/Bloodbank/Backend/userpage.php");
}

include('connect.php');

$aadhar = $_SESSION["aadhar"];

$tablestring = "
    <table class=\"w-full text-sm text-left text-gray-500 dark:text-gray-400\">
        <thead class=\"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400\">
            <tr>
                <th class=scope=\"col\" class=\"px-6 py-3\">Bank Name</th>
                <th scope=\"col\" class=\"px-6 py-3\">Time</th>
                <th scope=\"col\" class=\"px-6 py-3\">Action</th>
            </tr>
        </thead>
        <tbody>
";

$sql = "SELECT  `name`, `bankname`, `time`, `place`, `aadhar` FROM blood.certificate WHERE aadhar = '" . $aadhar . "';";
$res = mysqli_query($connect, $sql);
$counter = 0;
$row;

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_array($res)) {
            $counter++;
            $name = $row['name'];
            $bankname = $row['bankname'];
            $time = $row['time'];
            $place = $row['place'];
            $_SESSION["username"] = $name;
            $formname = "form" . $counter;

            $tablestring .= "<tr class=\"border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700\">";
            $tablestring .= "<td class=\"px-6 py-4\">" . $bankname . "</td>";
            $tablestring .= "<td class=\"px-6 py-4\">" . $time . "</td>";
            // $tablestring .= "<td>" . $time . "</td>";
            $tablestring .= "<form class=\"hidden\" id=\"" . $formname . "\" action=\"viewreport.php\" method=\"POST\" onsubmit=\"\">";
            $tablestring .= "<input type=\"hidden\" name=\"name\" value=\"" . $name . "\">";
            $tablestring .= "<input type=\"hidden\" name=\"time\" value=\"" . $time . "\">";
            $tablestring .= "<input type=\"hidden\" name=\"place\" value=\"" . $place . "\">";
            $tablestring .= "<input type=\"hidden\" name=\"bankname\" value=\"" . $bankname . "\">";
            $tablestring .= "</form>";
            $tablestring .= "<td class=\"px-6 py-4\ cursor-pointer\"><input class=\"cursor-pointer\" type=\"submit\" form=\"" . $formname . "\" value=\"View\"/></td></tr>";
        }
        $tablestring .= "</tbody></table>";
    } else {
        echo "<script>alert('User not authorized')</script>";
        header("location: http://localhost/Bloodbank/Backend/userpage.php");
    }
} else {
    echo "<script>alert('Invalid username or password, try again')</script>";
    header("location: http://localhost/Bloodbank/Backend/userpage.php");
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

<?php
echo "<script>
console.log(" . $tablestring . ");
</script>";
?>

</html>