<div class="container p-2">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./products.php">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./save.php?mode=insert">Add Product</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./manage.php">Manage Products</a>
					</li>
					<?php if (!isset($_SESSION['user_id'])) : ?>
						<li class="nav-item">
							<a class="nav-link" href="./login.php">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./register.php">Register</a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="./logout.php">Logout</a>
						</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
</div>
