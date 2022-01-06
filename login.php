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
            <div class="card-header bg-primary text-light d-flex justify-content-between">
              <span class="mt-2"><i>Login Form</i></span>
              <a class="btn btn-danger" href="fontint.php">Register</a>
            </div>
            <div class="card-body">

              <?php
              if(isset($_SESSION['log_err'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['log_err'];
                    unset($_SESSION['log_err']);
                    ?>
                    </div>
                <?php
              }
              ?>
            
              <form method="post" action="login_post.php">  
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary text-light">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require"inc/footer.php";?>
   