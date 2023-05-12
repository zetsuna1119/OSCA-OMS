<?php 
require 'connect.php';
$servername = "localhost";
$username = "root",
$password = "";
$dbname = "seniorcitizendb";

$conn = mysqli_connect($servername, $username, $pasword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$stmt = mysqli_prepare($conn, "UPDATE tblsenior SET `Image` = ? WHERE id = ?");

$mysqli_stmt_bind_param($stmt, "si", $image_data, $id);

$id = $id;
$image_data = file_get_contents("images/" . $Image);

mysqli_stmt_execute($stmt);

move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $Image);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>