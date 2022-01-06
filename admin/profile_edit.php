<?php
session_start();
require'navbar.php';
require'../inc/header.php';
require'../db.php';
require'check_admin.php';
$login_email = $_SESSION['email'];

$get_profile_query = "SELECT name,mobile FROM users WHERE email='$login_email'";
$from_db = mysqli_query($db_conect,$get_profile_query);
$after_assoc = mysqli_fetch_assoc($from_db);
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card mt-4">
					<div class="card-header d-flex justify-content-between">
						<h5 class="card-title">Profile Edite</h5>
					</div>
					<div class="card-body">
					<?php
              if(isset($_SESSION['profile_err'])){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['profile_err'];
                    unset($_SESSION['profile_err']);
                    ?>
                    </div>
                <?php
              }
              ?>

			
                    <form method="post" action="profile_edite_post.php">  
                    <div class="mb-3">
                    <label class="form-label">name</label>
                    <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                    <input type="hidden" name="email" class="form-control" value="<?=$login_email?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">mobile</label>
                    <input type="text" name="mobile" class="form-control" value="<?=$after_assoc['mobile']?>">
                    </div>
                    <button type="submit" class="btn btn-info">Edit</button>
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
