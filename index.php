<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php
    include_once'Assets/include.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
  <?php 
  include_once'Res/navbar.php';
  ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 border rounded p-4 my-3 bg-white" id="border">
                <label for="myLineChart"><h5 class="text-primary"><i class="fa-solid fa-chart-line"></i> Water Level Sensor</h5></label>
                <canvas id="myLineChart"></canvas>
            </div>
            <div class="col-md-5 rounded m-3 bg-white p-4 me-3">
                <div class="row ps-4 pt-3 justify-content-center">
                    <div class="col-md-5 pt-3 me-3 mb-3 rounded" id="border">
                        <label for=""><h3 class="text-secondary"><i class="fa-solid fa-chart-simple text-primary"></i> Status</h3></label>
                        <h3 id="res">-</h3>
                        <div id="time" style="font-size:0.8em;">-</div>
                    </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <div class="row">
                      <h6>Vision</h6>
                      <div class="small text-secondary" style="text-align: justify;">
                          To establish an efficient IoT-based water level monitoring and early warning system that strengthens disaster preparedness and environmental sustainability in Barangay Kinalaglagan.
                      </div>
                    </div>
                    <div class="row mt-2">
                      <h6>Mission</h6>
                      <div class="small text-secondary" style="text-align: justify;">
                          This system is developed to deliver real-time water level information, improve early flood detection mechanisms, and assist the community and local government units in implementing proactive disaster risk reduction strategies.
                      </div>
                    </div>
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
    var dt=[0,0,0,0,0,0];
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
        },
        animation:false
      }
    });
  }

    function fetchwaterlevel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var r=JSON.parse(this.responseText);
        var dist=parseInt(r.distance);
        if(dist<=0){dist=0;}
        if(dist>=200){dist=200;}
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
  }, 1000);
  </script>



<style>
  body {
  background: linear-gradient(to right, #dee4f5, #9db8ee);
}

</style>