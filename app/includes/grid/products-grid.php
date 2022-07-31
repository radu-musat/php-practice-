<div class="products-grid">
	<?php foreach ($products as $product): ?>
		<?php
		$url =  './app/page.php?id=' . $product->id;
		$discount = 0;
		$discountedPrice = 0;
		$discountElementClass = '';
		$discountPriceTagClass = '';
		$reducedPriceClass = '';
		$image_path = './app/'. $product->getProductImages()[0]->image_path;

		if (intval($product->discount) > 0) {
			$discount = $product->discount;
			$discountedPrice = $product->getDiscount();
			$discountElementClass = 'products-grid__card-price--discount';
			$discountPriceTagClass = 'discounted';
			$reducedPriceClass = 'discount';
			$url.= '&discount=' . $product->discount;
		}
		?>
		<a href="<?php echo $url ?>" class="products-grid__card">
			<div class="products-grid__card-top-bar">
				<i></i>
				<span>recomandat</span>
			</div>

			<picture>
				<img src="<?php echo $image_path ?>" alt="laptop">
			</picture>

			<div class="products-grid__card-price <?php echo $discountElementClass ?>">
				<span class="<?php echo $discountPriceTagClass ?>">
					<?php
					echo $product->price;
					?>
				</span>

				<?php if ($product->discount > 0): ?>
					<span>
						(<?php echo $product->discount ?>)%
					</span>
				<?php endif; ?>

				<span class="<?php echo $reducedPriceClass ?>">
					<?php
						if ($product->discount > 0) {
							echo round($discountedPrice, 2);
						}
					?>
					lei
				</span>
			</div>

			<p>
				<?php echo $product->name ?>
			</p>
			<button>Adauga in cos</button>
			<p class="products-grid__card-stock-text">• In stoc</p>
			<p class="products-grid__card-footer">
				Vandut de <span>CEL.ro</span>
			</p>
		</a>
	<?php endforeach; ?>
</div>
