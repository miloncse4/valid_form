<?php 
session_start();
require"inc/header.php";

if(isset($_SESSION['user_status'])){
	header('location: admin/dashboard.php');
}
?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mt-4">
            <div class="card-header bg-dark text-light d-flex justify-content-between">
              <i class="mt-2"><b>Register Form</b></i>
              <a class="btn btn-primary text-light" href="login.php"><i>Login</i></a>
            </div>
            <div class="card-body">

              <?php
              if(isset($_SESSION['reg_err'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['reg_err'];
                    unset($_SESSION['reg_err']);
                    ?>
                    </div>
                <?php
              }
              ?>

              <?php
              if(isset($_SESSION['reg_success'])){
                ?>
                    <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['reg_success'];
                    unset($_SESSION['reg_success']);
                    ?>
                    </div>
                <?php
              }
              ?>
            
              <form method="post" action="backend.php">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Mobile</label>
                  <input type="text" name="mobile" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-dark"><i>Submit</i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require"inc/footer.php";?>
   