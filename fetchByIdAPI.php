<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include "config.php";

$data = json_decode(file_get_contents("php://input"), true);
$product_id = $data['pid'];

$sql = "SELECT * FROM producttable WHERE productId = {$product_id}";
$result = mysqli_query($con, $sql) or die("SQL Query Failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array("message" => "No record found", "status" => false));
}
