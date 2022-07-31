<?php
if(!isset($_GET['id'])) {
	header("Location: index.php");
}

include "app/functions.php";
$product = Product::find($_GET['id']);
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include './app/includes/head.php'?>
    </head>

    <body>
		<!-- navigation -->
		<?php include './app/includes/nav.php' ?>

		<!-- page content -->
        <div class="container">
            <h1 class="h1 text-center">Are you sure you want to delete the following product? <br> <?php echo $product->name ?> </h1>.
			<div class="row">
				<div class ="col-12 d-flex justify-content-center">
					<a href="processDeleteProduct.php?id=<?php echo $_GET['id']; ?>" type="button" class="btn btn-success me-2">Yes</a>
					<a href="manage.php" type="button" class="btn btn-danger">No</a>
				</div>
			</div>
        </div>
    </body>
</html>

