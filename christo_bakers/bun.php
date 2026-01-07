<?php
header('Content-Type: application/json');

$filename = 'data.json';
if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input && isset($input['bunName'], $input['customerName'], $input['customerReview'])) {
        $orders = json_decode(file_get_contents($filename), true);
        $orders[] = $input;
        file_put_contents($filename, json_encode($orders, JSON_PRETTY_PRINT));
        echo json_encode(['message' => 'Order received successfully!']);
    } else {
        echo json_encode(['message' => 'Invalid data']);
    }
    exit;
}

$orders = json_decode(file_get_contents($filename), true);
echo json_encode($orders);
?>
