<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    $data = json_decode(file_get_contents('data.json'), true);

    $new_record = array(
        "id" => $id,
        "name" => $name,
        "category" => $category,
        "description" => $description,
        "price" => $price,
        "availability" => $availability
    );
    $data[] = $new_record;

    file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));

    echo "Record added successfully"; 
} else {
    echo "Invalid request";
}
?>
