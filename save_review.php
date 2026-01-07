<?php
$name = $_POST['name'];
$rating = $_POST['rating'];
$review = $_POST['review'];

$file = 'data.json';

if (file_exists($file)) {
    $reviews = json_decode(file_get_contents($file), true);
} else {
    $reviews = [];
}


$newReview = [
    'name' => $name,
    'rating' => $rating,
    'review' => $review,
    'timestamp' => time()
];

$reviews[] = $newReview;


file_put_contents($file, json_encode($reviews, JSON_PRETTY_PRINT));

echo 'Review saved successfully.';
?>
