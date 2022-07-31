<?php
include "app/functions.php";
$products = Product::findAll();
?>

<!doctype html>
<html lang="en">
	<head>
		<?php include './app/includes/head.php' ?>
	</head>

	<body>

		<!-- page content -->
		<div class="container">
			<h1 class="h1">Manage Products</h1>
			<?php if (isset($_SESSION['message'])) : ?>
				<div class="alert alert-success" role="alert">
					<?php
						echo $_SESSION['message'];
						unset($_SESSION['message'])
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php include './app/includes/nav.php' ?>

		<div class="container edit-table">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">#id</th>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Discount</th>
					<th scope="col">Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($products as $product): ?>
					<tr>
						<td><?php echo $product->id ?></td>
						<td>
							<a href=./app/page.php?id=<?php echo $product->id ?>>
								<?php echo $product->name ?>
							</a>
						</td>
						<td><?php echo $product->price ?></td>
						<td><?php echo $product->discount ?>%</td>
						<td>
							<a href="./save.php?mode=edit&id=<?php echo $product->id ?>">
								<i class="fa-solid fa-pencil"></i>
							</a>
							<a href="./delete.php?id=<?php echo $product->id ?>">
								<i class="fa-solid fa-trash"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>

