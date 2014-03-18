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
				$prodID = $_GET['product_id'];
				
				include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Product.php';
				$productInfo = new Product();
					$result = $productInfo->getProductById($prodID);
				
				while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
				echo "<tr>";
				foreach ($line as $col_value) {
					echo "<td>$col_value</td>";
					if ($col_value == end($line)){
						
					}
				}
				echo "\t</tr>\n";
				}
				?>
				
			</div>
		</div>
		<?php include 'Components/Footer.php';?>
		
</body>

</html>