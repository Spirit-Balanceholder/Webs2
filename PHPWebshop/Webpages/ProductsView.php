<html>
<head>
</head>
	<?php 
	include 'Components/htmlHead.php';
	?>
<body>
	<?php 
		include 'Components/Header.php'
	?>
		<div class = "container">
			<div class = "mainbody">
				
				<?php 
				include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Product.php';
				$productInfo = new Product();
				$result = $productInfo->getAllProducts();
				
				while($row = $result->fetch_assoc())
				{
					echo '<div class = "ProductThumb">
					<a class="thumbnail" href = "Product.php?product_id='.$row['idProduct'].'">
					<img src=http://'.$_SERVER['SERVER_NAME'].':'
					.$_SERVER['SERVER_PORT'].dirname($_SERVER['REQUEST_URI'])
					.$row['Image_path'].'></img>'
					.$row['Name']
					."<br>".$row['Description']
					.'</a>'
					.'</div>';
				}
				?>
			</div>
		</div>
		<?php include 'Components/Footer.php';?>
		
</body>

</html>