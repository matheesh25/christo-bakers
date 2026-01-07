<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cake = array(
        'name' => $_POST['name'],
        'flavor' => $_POST['flavor'],
        'price' => $_POST['price'],
        'size' => $_POST['size'],
        'type' => $_POST['type']
    );

    $data = array();

    if (file_exists('data.json')) {
        $json = file_get_contents('data.json');
        $data = json_decode($json, true);
    }

    $data[] = $cake;

    file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
    echo 'Success';
}
?>
