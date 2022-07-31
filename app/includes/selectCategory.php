<div class="container">
	<div class="row">
		<div class="col-4 card p-3 my-3">
			<form action="" method="post">
				<div class="mb-3">
					<label for="category_id" class="form-label">Select a category</label>
					<select class="form-select" name="category_id" id="category_id">
						<?php foreach($categories as $category): ?>
							<option value="<?php echo $category['id'] ?>">
								<?php echo $category['name']?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary" name="category-submit">Submit</button>
			</form>
		</div>
	</div>
</div>
