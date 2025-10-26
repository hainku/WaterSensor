<?php
  $role= $_SESSION['role'];  
?>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="Res/Images/logo.png" height="40px" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <!-- Left side -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php
            if($role=='admin'){

              echo'<a class="nav-link" href="main.php"><i class="fa-solid fa-grip"></i> Dashboard</a>';
            }else{
              echo'<a class="nav-link" href="usermain.php"><i class="fa-solid fa-grip"></i> Dashboard</a>';          
            }
          ?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-users-between-lines"></i> Resident</a>
          <ul class="dropdown-menu">
            <?php
            if($role=='admin'){
            ?>
            <li><a class="dropdown-item" href="resident.php"><i class="fa-solid fa-user-plus"></i> Add</a></li>
            <li><a class="dropdown-item" href="viewresident.php"><i class="fa-solid fa-magnifying-glass"></i> View</a></li>
            <?php }?>
            <li><a class="dropdown-item" href="residentlist.php"><i class="fa-solid fa-magnifying-glass"></i> Resident List</a></li>
          </ul>
        </li>
        <?php
        if($role=='admin'){
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> User</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user.php"><i class="fa-solid fa-user-plus"></i> Add</a></li>
            <li><a class="dropdown-item" href="viewuser.php"><i class="fa-solid fa-magnifying-glass"></i> View</a></li>
          </ul>
        </li>
        <?php
        }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-gear"></i> Settings</a>
          <ul class="dropdown-menu">
            <li data-bs-toggle="modal" data-bs-target="#passModal"><a class="dropdown-item"><i class="fa-solid fa-pen"></i> Change Password</a></li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> User</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="Res/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- The Modal -->
<div class="modal" id="passModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h4 class="modal-title"><i class="fa-solid fa-key"></i> Change Password</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
          <div class="row mt-3">
            <div class="col-md-12">
              <input type="password" class="form-control text-center" name="pass" id="pass" required>
              <label for="pass" class="position-relative label-margin">Enter Password<i class="text-danger">*</i></label>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <input type="password" class="form-control text-center" name="pass2" id="pass2" required>
              <label for="pass2" class="position-relative label-margin">Re-enter Password<i class="text-danger">*</i></label>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <input type="password" class="form-control text-center" name="pass3" id="pass3" required>
              <label for="pass3" class="position-relative label-margin">Enter New Password<i class="text-danger">*</i></label>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary rounded-pill"><i class="fa-solid fa-floppy-disk"></i> Update Password</button>
        <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Close</button>
      </div>

    </div>
  </div>
</div>
