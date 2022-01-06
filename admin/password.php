<?php
session_start();
require'navbar.php';
require'../inc/header.php';
require'../db.php';
require'check_admin.php';
$login_email = $_SESSION['email'];

?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card mt-4">
					<div class="card-header bg-info d-flex justify-content-between">
						<h5 class="card-title text-dark mt-2">Password Change Form</h5>
					</div>
					<div class="card-body">
					<?php
              if(isset($_SESSION['change_done'])):
                ?>
                    <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['change_done'];
                    unset($_SESSION['change_done']);
                    ?>
                    </div>
                <?php
              endif
              ?>

             <?php
              if(isset($_SESSION['change_didnot'])):
                ?>
                    <div class="alert alert-info" role="alert">
                    <?php
                    echo $_SESSION['change_didnot'];
                    unset($_SESSION['change_didnot']);
                    ?>
                    </div>
                <?php
              endif
              ?>

			
                    <form method="post" action="change_password_post.php">  
                    <div class="mb-3">
                    <label class="form-label">Old Password</label>
                    <input type="password" name="old_pass" class="form-control" value="">
                    <input type="hidden" name="email" class="form-control" value="<?=$login_email?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_pass" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_pass" class="form-control" value="">
                    </div>
                    <button type="submit" class="btn btn-warning">Change</button>
                </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
//require'../inc/footer.php';
?>
