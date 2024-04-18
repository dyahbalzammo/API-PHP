<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// include_once '/workspace/API-PHP/database.php';
// include_once '/workspace/API-PHP/employees.php';
// $database = new Database();

// $db = $database->getConnection();
// $items = new Employee($db);
// $records = $items->getEmployees();
// var_dump($records);

// $itemCount = $records->num_rows;
// echo json_encode($itemCount);
// if ($itemCount > 0) {
//     $employeeArr = array();
//     $employeeArr["body"] = array();
//     $employeeArr["itemCount"] = $itemCount;
//     while ($row = $records->fetch_assoc()) {
//         array_push($employeeArr["body"], $row);
//     }
//     echo json_encode($employeeArr);
// } else {
//     http_response_code(404);
//     echo json_encode(
//         array("message" => "No record found.")
//     );
// }


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '/workspace/API-PHP/database.php';
include_once '/workspace/API-PHP/employees.php';
$database = new Database();

$db = $database->getConnection();
$items = new Employee($db);
$records = $items->getEmployees();

$itemCount = $records->rowCount(); // Menggunakan rowCount() untuk menghitung jumlah baris

if ($itemCount > 0) {
    $employeeArr = array();
    $employeeArr["body"] = array();
    $employeeArr["itemCount"] = $itemCount;
    while ($row = $records->fetch(PDO::FETCH_ASSOC)) { // Menggunakan PDO::FETCH_ASSOC untuk mendapatkan hasil dalam bentuk asosiatif
        array_push($employeeArr["body"], $row);
    }
    echo json_encode($employeeArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

// echo json_encode(
//     array("message" => "Tes JSON")
// );
?>