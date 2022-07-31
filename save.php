<?php
include "./app/functions.php";

if(!isset($_GET['mode'])) {
	header("Location: index.php");
}

$products = readTable(Product::class);
$categories = readTable(Category::class);

$mode = $_GET['mode'];
$product_id = null;
$product = null;

$title = 'Add Product';
$action = './processSaveProduct.php';
$imagePath = 'images/laptop-1.webp';

if ($mode !== 'insert') {
	$product_id = $_GET['id'];
	$product = Product::find($product_id);

	$imagePath = ProductImage::findBy('product_id', $product_id)[0]->image_path;

	$title = 'Now editing: ' . $product->name;
	$action = './processSaveProduct.php?mode=edit';
	$product_id = $_GET['id'];
}

?>

<!doctype html>
<html lang="en">
	<head>
		<?php include './app/includes/head.php' ?>
	</head>

	<body>

		<!-- page content -->
		<div class="container">
			<h1 class="h1"><?php echo $title ?></h1>
		</div>
		<?php include './app/includes/nav.php' ?>
		<div class="container">
			<?php if (isset($_SESSION['message'])) : ?>
				<div class="alert alert-success" role="alert">
					<?php
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					?>
				</div>
			<?php endif; ?>
			<form action="<?php echo $action ?>" method="post">

				<?php if ($mode !== 'insert') : ?>
					<input type="hidden" class="form-control" id="prod_id" name="prod_id"
							placeholder="Add a new product..." value="<?php echo $product_id ?> ">
				<?php endif ?>

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter product name..."
							value="<?php echo isset($product->name) ? $product->name : ''; ?>">
				</div>
				<div class="mb-3">
					<label for="name" class="form-label">Image path</label>
					<input type="text" class="form-control" id="image" name="image" placeholder="Enter image path"
							value="<?php echo $imagePath ?>">
				</div>
				<div class="mb-3">
					<label for="price" class="form-label">Price</label>
					<input type="number" class="form-control" id="price" name="price" min="0"
							value="<?php echo isset($product->price) ? $product->price : 0; ?>">
				</div>
				<div class="mb-3">
					<label for="discount" class="form-label">Discount</label>
					<input type="number" class="form-control" id="discount" name="discount" min="0"
							value="<?php echo isset($product->discount) ? $product->discount : 0; ?>">
				</div>
				<div class="mb-3">
					<label for="select" class="form-label">Category</label>
					<select class="form-select"  name="category_id">
						<?php foreach($categories as $category): ?>
							<option value="<?php echo $category['id'] ?>">
								<?php echo $category['name']?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</body>
</html>

