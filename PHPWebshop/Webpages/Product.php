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
			<div class = "mainbody product-body">
				
				<?php
				$prodID = $_GET['product_id'];
				
				include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Product.php';
				$productInfo = new Product();
				$result = $productInfo->getProductById($prodID);
				
				$display = $result->fetch_assoc(); //gebruik display om data van het product te displayen
				echo "<h2>".$display['Name']."</h2>"; //example
				
				?>	
					
				<?php 
				echo "<table class='product-info'><tr><td>";
				include "testtext.php";
				echo $display['LongDescription'].'</div>';
				echo '</td><td><div class="product-img"><img src=http://'.$_SERVER['SERVER_NAME'].':'
				.$_SERVER['SERVER_PORT'].dirname($_SERVER['REQUEST_URI'])
				.$display['Image_path'].'></img></div></td></tr><table>';
				
				/*
				 * simpel test while loopje
				 */
// 				while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
// 				echo "<tr>";
// 				foreach ($line as $col_value) {
// 					echo "<td>$col_value</td>";
// 					if ($col_value == end($line)){
						
// 					}
// 				}
// 				echo "\t</tr>\n";
// 				}
				?>
				
			</div>
		</div>
		<?php include 'Components/Footer.php';?>
		
</body>

</html>