<?php
//Question 1
$url = 'https://www.cbn.gov.ng/Documents/circular.html';

$response = file_get_contents($url);
$data = json_decode($response, true);

$files = [];
foreach ($data as $item) {
    $files[] = $item['file'];
}

$jsonData = json_encode($files, JSON_PRETTY_PRINT);
file_put_contents('cbn_circular.json', $jsonData);


//Question 2
$apiKey = '';
$cseId = '';


$query = 'Who is Donald Trump';

$url = 'https://www.googleapis.com/customsearch/v1?key=' . $apiKey . '&cx=' . $cseId . '&q=' . urlencode($query);

$response = json_decode(file_get_contents($url), true);

$results = $response['items'];

foreach ($results as $result) {
    echo '<h2><a href="' . $result['link'] . '">' . $result['title'] . '</a></h2>';
    echo '<p>' . $result['snippet'] . '</p>';
}
