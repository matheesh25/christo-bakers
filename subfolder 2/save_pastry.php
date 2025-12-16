<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'data.json';


    $pastries = file_exists($file) ? json_decode(file_get_contents($file), true) : [];


    $newPastry = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'availability' => $_POST['availability']
    ];


    $pastries[] = $newPastry;


    file_put_contents($file, json_encode($pastries, JSON_PRETTY_PRINT));

    echo "Pastry saved successfully!";
} else {
    echo "Invalid request.";
}
?>
