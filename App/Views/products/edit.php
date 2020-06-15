<?php include VIEWS . '/layouts/header.php'; ?>


<!-- Masthead-->
<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="col-lg-10 align-self-end addProductPage">
				<?php
					if(isset($error)){
						echo "<p class='alert alert-danger col-md-12 text-center'>" . $error . "</p>";
					}

					if(isset($errorsValidate)){
						foreach($errorsValidate as $er){
							echo "<p class='alert alert-danger col-md-12 text-center'>" . $er . "</p>";
						}
					}

					if (isset($success)) {
						echo "<p class='alert alert-success col-md-12 text-center'>" . $success . "</p>";
					}
				?>
				<h3>Edit Product</h3>
				<form class="form-horizontal" method="post" action="<?php echo url('products/update'); ?>">
					<input type="hidden" name="id" value="<?php echo $product['id'] ?>">
					<div class="form-group row">
						<label class="label label-control col-md-3">Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $product['name'] ?>" name="name" placeholder="Name">
						</div>
					</div>
					<div class="form-group row">
						<label class="label label-control col-md-3">Content</label>
						<div class="col-md-9">
							<textarea class="form-control" name="content" placeholder="Content"><?php echo $product['content'] ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="label label-control col-md-3">Price</label>
						<div class="col-md-9">
							<input type="text" class="form-control" value="<?php echo $product['price'] ?>" name="price" placeholder="Price">
						</div>
					</div>
					<div class="form-group row">
						<label class="label label-control col-md-3">Quantity</label>
						<div class="col-md-9">
							<input type="number" class="form-control" value="<?php echo $product['qty'] ?>" name="qty" placeholder="Quantity">
						</div>
					</div>
					<div class="form-group row text-center">
						<div class="col-md-12">
							<input type="submit" name="submit" class="btn btn-info" value="Edit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<!-- About-->

<?php include VIEWS . '/layouts/footer.php'; ?>