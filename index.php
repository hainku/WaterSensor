<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include_once'Assets/include.php';?>
</head>
<body>
    <?php
    require_once'Class/User.php';
    $u=new User();
    if(isset($_POST['btnlogin'])){
        $un=$_POST['un'];
        $pw=$_POST['pw'];
        $data=$u->login($un,$pw);
        if($row=$data->fetch_assoc()){
            $_SESSION['role']=$row['Role'];
            if($row['Role']=='admin'){
                header('location:main.php');
            }else{
                header('location:usermain.php');
            }
        }else{
            echo'
                <script>
                    Swal.fire({
                        title: "Login",
                        text: "Invalid Username or Password",
                        icon: "warning"
                    });
                </script>
            ';
        }
    }
    ?>
    <div class="container">
        <form method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="container border p-4 mt-4 pb-5 pt-5" id="border">
                        <div class="row justify-content-center">
                            <img src="Res/Images/logo.png" class="w-50" alt="">
                        </div>
                        <div class="row mt-3">
                            <h5 class="text-center text-primary">Water Level Monitor</h5>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <input type="text" class="form-control position-relative text-center" name="un">
                                <label for="un" class="position-relative label-margin"><i class="fa-solid fa-user"></i> Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="password" class="form-control position-relative text-center" name="pw">
                                <label for="un" class="position-relative label-margin"><i class="fa-solid fa-key"></i> Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="form-control btn btn-primary rounded-pill" name="btnlogin"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
