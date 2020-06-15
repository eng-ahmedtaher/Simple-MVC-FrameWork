<?php include VIEWS . '/layouts/header.php'; ?>


<!-- Masthead-->
<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<?php
				if(isset($error)){
					echo "<p class='alert alert-danger col-md-12 text-center'>" . $error . "</p>";
				}

				if (isset($success)) {
					echo "<p class='alert alert-success col-md-12 text-center'>" . $success . "</p>";
				}
			?>
			<div class="col-lg-10 align-self-end tableProductPage">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Content</th>
							<th scope="col">Price</th>
							<th scope="col">QTY</th>
							<th scope="col">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $product) { ?>
						<tr>
							<th scope="row"><?php echo $product['id']; ?></th>
							<td><?php echo $product['name']; ?></td>
							<td><?php echo $product['content']; ?></td>
							<td><?php echo $product['price'] . ' $'; ?></td>
							<td><?php echo $product['qty']; ?></td>
							<td>
								<a href="<?php echo url('products/edit/' . $product['id']); ?>" class="btn btn-info">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo url('products/delete/' . $product['id']); ?>" class="btn btn-danger">
									<i class="fa fa-close"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</header>
<!-- About-->

<?php include VIEWS . '/layouts/footer.php'; ?>