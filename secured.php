<?php
include "./app/functions.php";
checkLogin();
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include './app/includes/head.php'?>
	</head>

	<body>

		<div class="container">
			<h1 class="h1">Secret Page</h1>
		</div>
		<!-- page content -->
		<?php include './app/includes/nav.php' ?>
		<div class="container">

			<?php if (isset($_SESSION['success_message'])) : ?>
				<div class="alert alert-success" role="alert">
					<?php
					echo $_SESSION['success_message'];
					unset($_SESSION['success_message']);
					?>
				</div>
			<?php endif; ?>

			<p class="mb-3">This is a page locked behind a login</p>
			<a href="logout.php" class="btn btn-primary">Logout</a>
		</div>
	</body>
</html>

