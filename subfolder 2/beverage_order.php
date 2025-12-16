<?php

$jsonFile = 'data.json';

if (file_exists($jsonFile)) {
    $orders = json_decode(file_get_contents($jsonFile), true);
} else {
    $orders = [];
}

$data = json_decode(file_get_contents("php://input"), true);

$orders[] = [
    "item" => $data['item'],
    "name" => $data['name'],
    "review" => $data['review']
];

file_put_contents($jsonFile, json_encode($orders, JSON_PRETTY_PRINT));

echo json_encode(["message" => "Order received successfully!"]);
?>
