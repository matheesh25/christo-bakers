<?php
$file = 'data.json';

if (file_exists($file)) {
    $pastries = file_get_contents($file);
    echo $pastries;
} else {
    echo json_encode([]);
}
?>
