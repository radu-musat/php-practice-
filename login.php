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
			<h1 class="h1">Login</h1>
		</div>
        <!-- page content -->
		<?php include './app/includes/nav.php' ?>

		<!--login form-->
        <div class="container">
			<?php if (isset($_SESSION['error_message'])) : ?>
				<div class="alert alert-danger" role="alert">
					<?php
					echo $_SESSION['error_message'];
					unset($_SESSION['error_message']);
					?>
				</div>
			<?php endif; ?>

			<form action="processLogin.php" method="POST" class="mb-3">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
			<a href="register.php" class="btn btn-primary">Register</a>
        </div>
    </body>
</html>

