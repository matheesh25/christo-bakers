<?php
if (file_exists('data.json')) {
    $json = file_get_contents('data.json');
    echo $json;
} else {
    echo json_encode([]);
}
?>
