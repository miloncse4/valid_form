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
					<div class="card-header bg-danger d-flex justify-content-between">
						<h5 class="card-title mt-2 text-light">User List</h5>
                        <a href="profile_edit.php" class="btn btn-sm btn-primary mt-2">Edit</a>
					</div>
					<div class="card-body">
					<?php
              if(isset($_SESSION['profile_success'])){
                ?>
                    <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['profile_success'];
                    unset($_SESSION['profile_success']);
                    ?>
                    </div>
                <?php
              }
              ?>
                        <p><strong class="card-title me-3">Name </strong><?=$after_assoc['name']?></p>
                        <p><strong class="card-title me-3">Email</strong><?=$after_assoc['mobile']?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
//require'../inc/footer.php';
?>
