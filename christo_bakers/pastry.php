<?php
// Set the correct header
header('Content-Type: application/json');

// Load existing pastries data from a JSON file
$filename = 'pastries.json';
if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([]));
}

// If it's a POST request, add a new pastry
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if ($input && isset($input['name'], $input['description'], $input['price'])) {
        $pastries = json_decode(file_get_contents($filename), true);
        $pastries[] = $input;
        file_put_contents($filename, json_encode($pastries, JSON_PRETTY_PRINT));
        echo json_encode(['message' => 'Pastry added successfully!']);
    } else {
        echo json_encode(['message' => 'Invalid input']);
    }
    exit;
}

// Otherwise (GET request), show all pastries
$pastries = json_decode(file_get_contents($filename), true);
echo json_encode($pastries);

?>
