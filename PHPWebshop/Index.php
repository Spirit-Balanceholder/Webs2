<!DOCTYPE html>
<html>
<head>
	<?php 
	include 'Webpages/Components/htmlHead.php';
	?>
</head>
<body>
	<?php 
		include 'Webpages/Components/Header.php';
	?>
	<div class = "wrap container">
		<div class="mainbody">
			<div class="Welcome">
				<h1>Welcome to Green Dragons Lair</h1>
				<h2>The place for all your fantasy needs</h2>
			</div>
			
			<div class="row">
				
				<div class="col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>Weekly Offer</h3>
						</div>
						<div class="panel-body">
							<a class="thumbnail" href = "Webpages/Product.php">
							<img src="Webpages/img/DummyProduct.jpg">
							Computah
							</a>
						</div>
					</div>				
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>Most Popular</h3>
						</div>
						<div class="panel-body">
							<a class="thumbnail" href = "Webpages/Product.php">
							<img src="Webpages/img/DummyProduct.jpg">
							Computah
							</a>
						</div>
					</div>				
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>Newest Addition</h3>
						</div>
						<div class="panel-body">
							<a class="thumbnail" href = "Webpages/Product.php">
							<img src="Webpages/img/DummyProduct.jpg">
							Computah
							</a>
						</div>
					</div>				
				</div>
				
			</div>
		</div>
	</div>
	<?php 
		include 'Webpages/Components/Footer.php';
	?>
</body>

</html>