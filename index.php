<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <?php include_once 'Assets/include.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: linear-gradient(to right, #dee4f5, #9db8ee);
        }
    </style>
</head>

<body>

<?php include_once 'Res/navbar.php'; ?>

<div class="container">
    <div class="row mt-4">

        <!-- CHART -->
        <div class="col-md-6 border rounded p-4 my-3 bg-white">
            <h5 class="text-primary">
                <i class="fa-solid fa-chart-line"></i> Water Level Sensor
            </h5>
            <canvas id="myLineChart"></canvas>
        </div>

        <!-- STATUS -->
        <div class="col-md-5 rounded m-3 bg-white p-4">
            <h3 class="text-secondary">
                <i class="fa-solid fa-chart-simple text-primary"></i> Status
            </h3>

            <h3 id="res">-</h3>
            <div id="time" style="font-size:0.8em;">-</div>

            <hr>

            <h6>Vision</h6>
            <div class="small text-secondary" style="text-align: justify;">
                To establish an efficient IoT-based water level monitoring and early warning system that strengthens
                disaster preparedness and environmental sustainability in Barangay Kinalaglagan.
            </div>

            <h6 class="mt-3">Mission</h6>
            <div class="small text-secondary" style="text-align: justify;">
                This system delivers real-time water level information, improves early flood detection mechanisms,
                and assists the community and LGUs in proactive disaster risk reduction strategies.
            </div>
        </div>

    </div>
</div>

<!-- ===================== SCRIPT ===================== -->
<script>
let ctx = document.getElementById('myLineChart').getContext('2d');

let labels = [];
let dataPoints = [];

let myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Water Level',
            data: dataPoints,
            borderColor: 'blue',
            backgroundColor: 'rgba(0,123,255,0.2)',
            fill: true,
            tension: 0.3,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        animation: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 150
            }
        }
    }
});

function fetchWaterLevel() {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            let response;
            try {
                response = JSON.parse(xhr.responseText);
            } catch (e) {
                console.error("Invalid JSON:", xhr.responseText);
                return;
            }

            let dist = parseFloat(response.distance);
            if (isNaN(dist)) return;

            // Clamp values
            if (dist < 0) dist = 0;
            if (dist > 150) dist = 150;

            document.getElementById("res").innerHTML = dist.toFixed(2);
            document.getElementById("time").innerHTML = response.time;

            // Keep last 10 points only
            if (labels.length >= 10) {
                labels.shift();
                dataPoints.shift();
            }

            labels.push(response.time);
            dataPoints.push(dist);

            myLineChart.update();
        }
    };

    // Cache-buster to force fresh data
    xhr.open("GET", "receiver.php?_=" + Date.now(), true);
    xhr.send();
}

// Fetch every second
setInterval(fetchWaterLevel, 1000);
</script>

</body>
</html>
