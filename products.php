<?php
include "./app/functions.php";
$categories = readTable(Category::class);
$products = Product::findAll();

if(isset($_POST['search-submit'])) {
	unset($_GET);
	$products = handleSearch($_POST['search-value']);
}

if(isset($_POST['category-submit'])) {
	header("Location: products.php?cat_id=" . $_POST['category_id']);
}

if(isset($_GET['cat_id'])) {
	$categoryId = $_GET['cat_id'];
	$selectedCategory = Category::find($categoryId);
	$selectedCategory->setProducts();
	$products = $selectedCategory->products;
}

?>

<!doctype html>
<html lang="en">
    <head>
        <?php include './app/includes/head.php'?>
		<title></title>
	</head>
    <body>
		<?php include './app/includes/nav.php'?>
        <!-- header-->
        <?php include './app/includes/header.php'; ?>

		<!--category select-->
		<?php include './app/includes/selectCategory.php'; ?>

        <!-- page content -->
        <div class="page-content">
            <!-- aside -->
            <?php include './app/includes/aside.php' ?>

            <main>
                <section>
                    <!-- sort-bar -->
                    <?php include './app/includes/sort-bar.php' ?>

                    <!-- products-grid-->
                    <?php include './app/includes/grid/products-grid.php' ?>

                    <!-- pagination -->
                    <?php include './app/includes/pagination.php' ?>
                </section>
            </main>
        </div>

    </body>
</html>

