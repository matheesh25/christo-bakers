<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No ID provided"]);
    exit();
}

$id = $_GET['id'];

if (!file_exists('data.json')) {
    echo json_encode(["error" => "Data file not found"]);
    exit();
}

$json = file_get_contents('data.json');
$data = json_decode($json, true);

if ($data === null) {
    echo json_encode(["error" => "Invalid JSON format"]);
    exit();
}

foreach ($data as $record) {
    if (isset($record['id']) && $record['id'] == $id) {
        echo json_encode($record, JSON_PRETTY_PRINT);
        exit();
    }
}

echo json_encode(["error" => "Record not found"]);
?>
