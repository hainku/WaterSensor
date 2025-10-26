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
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $role=$_POST['role'];
        $response=$u->adduser($ln,$fn,$mn,$contact,$address,$role);
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
                <h5><i class="fa-solid fa-user-plus"></i> Add User Information <i class="text-danger"><small>(* Required Fields)</small></i></h5>
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
            <div class="row mt-4">
                <div class="col-md-5">
                    <input type="text" class="form-control position-relative" id="address" name="address" required>
                    <label for="address" class="position-relative label-margin">Address<i class="text-danger">*</i></label>
                </div>
                <div class="col-md-3">
                    <input type="tel" class="form-control position-relative" id="contact" name="contact" required>
                    <label for="address" class="position-relative label-margin">Contact No<i class="text-danger">*</i></label>
                </div>
            </div>
           <div class="row mt-4">
            <div class="col-md-3">
                <select name="role" id="role" class="form-control position-relative">
                    <option value=""selected disbaled></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <label for="role" class="position-relative label-margin">Role</label>
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
