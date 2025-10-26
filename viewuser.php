<?php session_start();
require_once'Class/Session.php';
$s=new Session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Household List</title>
    <?php
    include_once'Assets/include.php';
    ?>
</head>
<body class="text-secondary">
    <?php 
    include_once'Res/navbar.php';
    require_once'Class/User.php';
    $u=new User();
   $data=$u->displayuser();
    ?>
    <div class="container">
       <div class="row mt-3">
            <h3><i class="fa-solid fa-house-user text-primary"></i> User List</h3>
       </div>
       <div class="row mt-3">
            <div class="col-md-10 text-end">
                <a href="Report/userlist.php" target="new"><button class="btn btn-primary shadow-none"><i class="fas fa-print"></i></button></a>
            </div>
       </div>
       <div class="row mt-3">
        <div class="col-md-10">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $c=0;
                        while($row=$data->fetch_assoc()){
                            $stat=$row['Status'];
                            $chk=($stat==1) ? 'checked':'';
                            $c++;
                            echo'
                                <tr>
                                    <td>'.$c.'</td>
                                    <td>
                                        <div class="fw-bold">'.$row['LastName'].', '.$row['FirstName'].' - '.$row['MiddleName'].'</div>
                                        <div class="text-primary" style="margin-top:-0.5em;"><small>'.$row['ContactNo'].'</small></div>
                                    </td>
                                    <td>'.$row['Address'].'</td>
                                    <td>'.$row['Role'].'</td>
                                    <td><input type="checkbox" '.$chk.'></td>
                                    <td class="text-center"><button class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-eye"></i></button><button class="btn shadown-none text-primary" onclick="printuser(this.value)" value="'.$row['UserID'].'"><i class="fas fa-print"></i></button></td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
       </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-house-user text-primary"></i> User Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control pt-2 position-relative" name="ln" id="ln" required>
                                <label class="position-relative label-margin" for="ln">Last Name<i class="text-danger">*</i></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control pt-2 position-relative" name="fn" id="fn" required>
                                <label class="position-relative label-margin" for="fn">First Name<i class="text-danger">*</i></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control pt-2 position-relative" name="mn" id="mn">
                                <label class="position-relative label-margin" for="mn">Middle Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="address" name="address" required>
                                <label for="address" class="position-relative label-margin">Address<i class="text-danger">*</i></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="contact">Contact Number<i class="text-danger">*</i></label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="text" class="form-control" id="contact" name="contact" maxlength="10" placeholder="9123456789" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary rounded-pill"><i class="fa-solid fa-cloud-arrow-up"></i> Update</button>
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Close</button>
                </div>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
    function printuser(userid){
        window.open("Report/userinfo.php?userid="+userid,"_new");
    }
</script>