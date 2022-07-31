<?php
include 'functions.php';

$id = $_GET['id'];
if(!isset($id)) {
	header('Location: '. '../index.php');
}

$product = Product::find($id);

$discount = '';
$lineThroughClass = '';
$discountedPrice = 0;
$image_path = './'. ProductImage::findBy('product_id', $id)[0]->image_path;

if (isset($_GET['discount'])) {
	$lineThroughClass = 'text-decoration-line-through';
	$discountedPrice = $product->getDiscount();
}

?>
<!doctype html>
<html lang="en">
    <head>
        <?php include './includes/head.php'?>
    </head>
    <body>
        <!-- header-->
        <?php include './includes/header.php'; ?>

        <!-- page content -->
        <div class="page-content-product">
            <main class="container">
				<h1 class="h3 border-0">
					<?php echo $product->name ?>
				</h1>
                <section  class="row">
					<div class="col-md-6">
						<picture>
							<img src="<?php echo $image_path?>" alt="image">
						</picture>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-12">
								<span class="fs-2 <?php echo $lineThroughClass ?>">
									<span> <?php echo $product->price ?> </span>
									lei cu TVA
								</span>
							</div>
							<?php if (isset($_GET['discount'])): ?>

								<div class="col-12">
								<span class="fs-3">
									<span><?php echo floor($discountedPrice) ?> </span>
									 - (<?php echo $discount ?>%)
									lei cu TVA
								</span>
								</div>

							<?php endif; ?>
						</div>
					</div>
                </section>
            </main>
        </div>

    </body>
</html>
