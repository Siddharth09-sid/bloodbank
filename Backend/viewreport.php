<?php

if (
    !isset($_SESSION["loggedin"]) ||
    !$_SESSION["loggedin"] ||
    (!$_SESSION["username"] || !$_SESSION["phone"]) ||
    !$_SESSION["aadhar"]
) {
    echo '<script>alert("User not Authorized");</script>';
    header("location: http://localhost/Bloodbank/Backend/userpage.php");
}

include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $aadhar = $_SESSION["aadhar"];
    $bloodbank = $_POST["bankname"];
    $name = $_POST["name"];
    $time = $_POST["time"];
    $place = $_POST["place"];

    include('../lib/fpdf/fpdf.php');
    $pdf = new FPDF();

    $pdf->AddPage();

    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);

    // Prints a cell with given text 
    $pdf->Cell(60, 20, 'Your Blood Report');

    $pdf->Cell(60, 40, 'Blood Bank');
    $pdf->Cell(100, 40, $bloodbank);

    $pdf->Cell(60, 50, 'Name');
    $pdf->Cell(100, 50, $name);

    $pdf->Cell(60, 60, 'Time');
    $pdf->Cell(100, 60, $time);

    $pdf->Cell(60, 70, 'place');
    $pdf->Cell(100, 70, $place);

    $pdf->Cell(60, 80, 'aadhar');
    $pdf->Cell(100, 80, $aadhar);

    // return the generated output
    $pdf->Output();


    // $sql = "SELECT name, bankname, time, place, aadhar FROM blood.certificate WHERE aadhar = '" . $aadhar . "' and bankname = '" . $blookbank . "';";
    // $res = mysqli_query($connect, $sql);
    // if ($res) {
    //     if (mysqli_num_rows($res) > 0) {
    //         $row = mysqli_fetch_array($res);
    //         $name = $row['name'];
    //         $time = $row['time'];
    //         $place = $row['place'];
    //         echo "<script>console.log('" . date_format($time, "Y/m/d H:i:s") . "')</script>";
    //     } else {
    //         echo "<script>alert('User not authorized')</script>";
    //         header("location: http://localhost/Bloodbank/Backend/userpage.php");
    //     }
    // } else {
    //     echo "<script>alert('Invalid username or password, try again')</script>";
    // }
} else {
    echo "<script>alert('Invalid username or password, try again')</script>";
}
