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
   $data=$u->displayresident();
    ?>
    <div class="container">
       <div class="row mt-3">
            <h3><i class="fa-solid fa-house-user text-primary"></i> Resident List</h3>
       </div>
       <div class="row mt-3">
        <div class="col-md-10">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>House Number</th>
                        <th>Street</th>
                        <th>Purok</th>
                        <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $c=0;
                        while($row=$data->fetch_assoc()){
                            $c++;
                            echo'
                                <tr>
                                    <td>'.$c.'</td>
                                    <td>
                                        <div class="fw-bold">'.$row['LastName'].', '.$row['FirstName'].' - '.$row['MiddleName'].'</div>
                                        <div class="text-primary" style="margin-top:-0.5em;"><small>'.$row['ContactNo'].'</small></div>
                                    </td>
                                    <td>'.$row['HouseNumber'].'</td>
                                    <td>'.$row['Street'].'</td>
                                    <td>'.$row['Purok'].'</td>
                                    <td class="text-center"><button class="btn shadow-none" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-eye"></i></button></td>
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
                    <h4 class="modal-title"><i class="fa-solid fa-house-user text-primary"></i> Residents Information</h4>
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
                            <div class="col-md-3">
                                <input type="text" class="form-control pt-2 position-relative" name="hn" id="hn" required>
                                <label class="position-relative label-margin" for="ln">House Number<i class="text-danger">*</i></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control pt-2 position-relative" name="street" id="street">
                                <label class="position-relative label-margin" for="street">Street</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control pt-2 position-relative" name="purok" id="purok"required>
                                <label class="position-relative label-margin" for="ln">Purok<i class="text-danger">*</i></label>
                            </div>
                            <div class="col-md-5">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="hh" name="hh">
                                <label class="form-check-label" for="hh">
                                    House Hold Head?
                                </label>
                                </div>
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
