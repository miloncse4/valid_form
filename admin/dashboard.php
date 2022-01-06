<?php
session_start();
require'navbar.php';
require'../inc/header.php';
require'../db.php';
require'check_admin.php';
$get_query = "SELECT * FROM users";
$from_db = mysqli_query($db_conect,$get_query);
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mr-4">
				<div class="card mt-4">
					<div class="card-header bg-success text-light">
						<h5 class="card-title mt-2 text-center text-bold"><i>Users List</i></h5>
					</div>
					<div class="card-body">
						<table class="table table-border">
							<thead>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
							</thead>
							<tbody>
								<?php
									foreach ($from_db as $user):
								?>
								<tr>
									<td><?=$user['name']?></td>
									<td><?=$user['email']?></td>
									<td><?=$user['mobile']?></td>
								</tr>
								<?php
									endforeach
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
//require'../inc/footer.php';
?>
