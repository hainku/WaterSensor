<?php session_start();
require_once'Class/Session.php';
$s=new Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident Info</title>
    <?php
    include_once'Assets/include.php';
    ?>
    <script src="Assets/chart.js"<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resident Info</title>
    <?php
    include_once'Assets/include.php';
    ?>
    <script src="Assets/chart.js"></script>
</head>
<body class="text-secondary">
    <?php 
    include_once'Res/navbar.php';
    require_once'Class/User.php';
    $u=new User();
    if(isset($_POST['btnsave'])){
        $ln=$_POST['ln'];
        $fn=$_POST['fn'];
        $mn=$_POST['mn'];
        $hn=$_POST['hn'];
        $street=$_POST['street'];
        $purok=$_POST['purok'];
        $contact=$_POST['contact'];
        $hh = isset($_POST['hh']) ? 1 : 0;
        $response=$u->add($ln,$fn,$mn,$hn,$street,$purok,$contact,$hh);
        $title=$response['success']==true?'Successful':'Error';
        echo'
        <script>
        Swal.fire({
            title: "'.$title.'",
            text: "'.$response['message'].'",
            icon: "'.$response['icon'].'"
            });
        </script>
            ';
    }
    ?>
    <div class="container">
        <form method="POST">
            <div class="row mt-4">
                <h5><i class="fa-solid fa-user-plus"></i> Add Resident Information <i class="text-danger"><small>(* Required Fields)</small></i></h5>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="ln" name="ln" required>
                    <label for="ln" class="position-relative label-margin">Last Name<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="fn" name="fn" required>
                    <label for="fn" class="position-relative label-margin">First Name<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="mn" name="mn">
                    <label for="mn" class="position-relative label-margin">Middle Name</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control position-relative" id="hn" name="hn" required>
                    <label for="hn" class="position-relative label-margin">House Number<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control position-relative" id="street" name="street">
                    <label for="street" class="position-relative label-margin">Street</label>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control position-relative" id="purok" name="purok" required>
                    <label for="purok" class="position-relative label-margin">Purok<i class="text-danger">*</i></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="contact">Contact Number<i class="text-danger">*</i></label>
                    <div class="input-group">
                        <span class="input-group-text">+63</span>
                        <input type="text" class="form-control" id="contact" name="contact" maxlength="10" placeholder="9123456789">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hh" name="hh">
                    <label class="form-check-label" for="hh">
                        House Hold Head?
                    </label>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <button class="btn btn-primary rounded-pill form-control" name="btnsave"><i class="fa-solid fa-floppy-disk"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>
></script>
</head>
<body class="text-secondary">
    <?php 
    include_once'Res/navbar.php';
    require_once'Class/User.php';
    $u=new User();
    if(isset($_POST['btnsave'])){
        $ln=$_POST['ln'];
        $fn=$_POST['fn'];
        $mn=$_POST['mn'];
        $hn=$_POST['hn'];
        $street=$_POST['street'];
        $purok=$_POST['purok'];
        $contact=$_POST['contact'];
        $hh = isset($_POST['hh']) ? 1 : 0;
        $response=$u->add($ln,$fn,$mn,$hn,$street,$purok,$contact,$hh);
        $title=$response['success']==true?'Successful':'Error';
        echo'
        <script>
        Swal.fire({
            title: "'.$title.'",
            text: "'.$response['message'].'",
            icon: "'.$response['icon'].'"
            });
        </script>
            ';
    }
    ?>
    <div class="container">
        <form method="POST">
            <div class="row mt-4">
                <h5><i class="fa-solid fa-user-plus"></i> Add Resident Information <i class="text-danger"><small>(* Required Fields)</small></i></h5>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="ln" name="ln" required>
                    <label for="ln" class="position-relative label-margin">Last Name<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="fn" name="fn" required>
                    <label for="fn" class="position-relative label-margin">First Name<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control position-relative" id="mn" name="mn">
                    <label for="mn" class="position-relative label-margin">Middle Name</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control position-relative" id="hn" name="hn" required>
                    <label for="hn" class="position-relative label-margin">House Number<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control position-relative" id="street" name="street">
                    <label for="street" class="position-relative label-margin">Street</label>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control position-relative" id="purok" name="purok" required>
                    <label for="purok" class="position-relative label-margin">Purok<i class="text-danger">*</i></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="contact">Contact Number<i class="text-danger">*</i></label>
                    <div class="input-group">
                        <span class="input-group-text">+63</span>
                        <input type="text" class="form-control" id="contact" name="contact" maxlength="10" placeholder="9123456789">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hh" name="hh">
                    <label class="form-check-label" for="hh">
                        House Hold Head?
                    </label>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <button class="btn btn-primary rounded-pill form-control" name="btnsave"><i class="fa-solid fa-floppy-disk"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>
