<?php
header('Content-Type: application/json');

$file = "latest_distance.json"; // store as JSON instead of plain text

// If distance is sent from ESP8266
if (isset($_GET['distance'])) {
    $distance = $_GET['distance'];

    // Prepare data with distance + timestamp
    $data = [
        'distance' => $distance,
        'time' => date("Y-m-d H:i:s")
    ];

    // Save JSON to file
    file_put_contents($file, json_encode($data));

    echo json_encode($data);
} else {
    // If no new data, show last saved JSON
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo json_encode([
            'distance' => null,
            'time' => 'No data yet'
        ]);
    }
}
?>
