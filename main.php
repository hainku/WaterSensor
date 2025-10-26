<?php session_start();
require_once'Class/Session.php';
$s=new Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
    include_once'Assets/include.php';
    ?>
    <script src="Assets/chart.js"></script>
</head>
<body>
  <?php 
  include_once'Res/navbar.php';
  include_once'Class/User.php';
  $u=new User();
  $residentcount=$u->residentcount();
  $householdcount=$u->householdcount();
  $usercount=$u->usercount();
  
  ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 border rounded p-4 m-3" id="border">
                <label for="myLineChart"><h5 class="text-primary"><i class="fa-solid fa-chart-line"></i> Water Level Sensor</h5></label>
                <canvas id="myLineChart"></canvas>
            </div>
            <div class="col-md-5 rounded m-3">
                <div class="row">
                    <div class="col-md-4 pt-3 me-3 mb-3 rounded" id="border">
                        <label for=""><h5 class="text-secondary"><i class="fa-solid fa-person text-primary"></i> Residents</h5></label>
                        <h1 class="text-center"><?=$residentcount;?></h1>
                    </div>
                    <div class="col-md-4 pt-3 me-3 mb-3 rounded" id="border">
                        <label for=""><h6 class="text-secondary"><i class="fa-solid fa-house-user text-primary"></i> Households</h6></label>
                        <h1 class="text-center"><?=$householdcount;?></h1>
                    </div>
                    <div class="col-md-4 pt-3 me-3 mb-3 rounded" id="border">
                        <label for=""><h5 class="text-secondary"><i class="fa-solid fa-users text-primary"></i> Users</h5></label>
                        <h1 class="text-center"><?=$usercount;?></h1>
                    </div>
                    <div class="col-md-4 pt-3 me-3 mb-3 rounded" id="border">
                        <label for=""><h5 class="text-secondary"><i class="fa-solid fa-chart-simple text-primary"></i> Status</h5></label>
                        <h5 id="res">-</h5>
                        <div id="time" style="font-size:0.8em; margin-top:-1em;">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
  var myLineChart;
    const ctx = document.getElementById('myLineChart').getContext('2d');
    var lbl=[0,0,0,0,0,0];
    var dt=['-','-',',','-','-','-'];
    renderChart();
    function renderChart(){
      if (myLineChart) {
        myLineChart.destroy(); // destroy old chart before re-creating
      }
    myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        //labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        labels: lbl,
        datasets: [{
          label: 'Water Level',
          //data: [120, 150, 180, 90, 200, 250],
          data: dt,
          borderColor: 'blue',
          backgroundColor: 'rgba(0, 123, 255, 0.2)',
          fill: true,
          tension: 0.3, // smooth curve
          pointRadius: 5,
          pointBackgroundColor: 'blue'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top'
          },
          tooltip: {
            enabled: true
          }
        },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

    function fetchwaterlevel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var r=JSON.parse(this.responseText);
        var dist=parseFloat(250)-parseFloat(r.distance);
        if(dist<0){dist=0;}
        document.getElementById("res").innerHTML = dist.toFixed(2);
        document.getElementById("time").innerHTML = r.time;
        lbl.shift();
        dt.shift();
        lbl.push(r.time);
        dt.push(dist.toFixed(2));
        renderChart();

      }
    };
    xhttp.open("GET", "receiver.php", true);
    xhttp.send();
  }
  setInterval(() => {
    fetchwaterlevel();
  }, 5000);
  </script>