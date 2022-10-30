<?php
include 'condb.php';
session_start();

$ctm_name = $_POST['ctm_name'];
$ctm_password = $_POST['ctm_password'];

$sql = "SELECT * FROM customer where ctm_name='$ctm_name' and ctm_password='$ctm_password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row > 0) {
    $_SESSION["ctm_email"] = $row['ctm_email'];
    $_SESSION["ctm_password"] = $row['ctm_password'];
    $_SESSION["userid"] = $row['customer_id'];
    $_SESSION["ctm_name"] = $row['ctm_name'];
    $_SESSION["ctm_sname"] = $row['ctm_sname'];
    header("location:show_product.php");
} else {
    header("location:login.php");
}
?>