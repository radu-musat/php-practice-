<?php
include "./app/functions.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include './app/includes/head.php'?>
    </head>

    <body>

        <div class="container">
            <h1 class="h1">Register</h1>
        </div>
        <!-- page content -->
        <?php include './app/includes/nav.php' ?>

        <!--register form-->
        <div class="container">
			<?php if (isset($_SESSION['error_message'])) : ?>
				<div class="alert alert-danger" role="alert">
					<?php
					echo $_SESSION['error_message'];
					unset($_SESSION['error_message']);
					?>
				</div>
			<?php endif; ?>

			<form action="processRegister.php" method="post">
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputEmail1">Phone</label>
					<input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputPassword1">Password</label>
					<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-group mb-3">
					<label for="exampleInputPassword2">Confirm password</label>
					<input name="confirm_pass" type="password" class="form-control" id="exampleInputPassword2" placeholder="Retype Password">
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
        </div>
    </body>
</html>

