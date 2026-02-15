<?php
header('Content-Type: application/json');
require_once 'Class/Reading.php';

date_default_timezone_set("Asia/Manila");

$r = new Reading();

$dataFile    = "latest_distance.json";
$saveTracker = "last_save.txt";

/*
|--------------------------------------------------------------------------
| HANDLE ESP8266 DATA
|--------------------------------------------------------------------------
*/
if (isset($_GET['distance'])) {

    // ✅ VALIDATE INPUT (VERY IMPORTANT)
    if (!is_numeric($_GET['distance'])) {
        echo json_encode([
            'error' => 'Invalid distance value',
            'raw'   => $_GET['distance']
        ]);
        exit;
    }

    $distance = (float) $_GET['distance'];
    $now      = time();

    // Optional clamp (avoid crazy values)
    if ($distance < 0)   $distance = 0;
    if ($distance > 500) $distance = 500;

    $data = [
        'distance' => $distance,
        'time'     => date("Y-m-d H:i:s"),
        'db_saved' => false
    ];

    // ✅ SAVE LATEST SENSOR VALUE (ALWAYS)
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

    // ✅ READ LAST DB SAVE TIME
    $lastSave = file_exists($saveTracker)
        ? (int) file_get_contents($saveTracker)
        : 0;

    // ✅ SAVE TO DB ONCE PER MINUTE
    if (($now - $lastSave) >= 60) {
        $r->save($distance);
        file_put_contents($saveTracker, $now);
        $data['db_saved'] = true;
    }

    echo json_encode($data);
    exit;
}

/*
|--------------------------------------------------------------------------
| DASHBOARD POLLING (NO NEW DATA)
|--------------------------------------------------------------------------
*/
if (file_exists($dataFile)) {
    echo file_get_contents($dataFile);
} else {
    echo json_encode([
        'distance' => null,
        'time'     => 'No data yet',
        'db_saved' => false
    ]);
}
exit;
