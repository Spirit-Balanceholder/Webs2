<!DOCTYPE html>
<html>
	<head>
		<title>Show All Products</title>
		<?php include '/Components/htmlHead.php'?>
	</head>
	<body>
	<h2>Products!</h2>
<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Product.php';
$productInfo = new Product();
$result = $productInfo->getAllProducts();

echo "<table border='1'>";
echo "<tr>"
		."<th>ProductID(dit is test, halen we weg)</th>"
		."<th>Category_id</th>"
		."<th>Name</th>"
		."<th>Description</th>"
		."<th>Designed by</th>"
		."<th>Estimated delivery days</th>"
		."<th>Image</th>"
		."<th>Image_path</th>"
	."</tr>";
while($row = $result->fetch_assoc()){
	echo "<tr>"
			."<td>".$row['idProduct']."</td>"
			."<td>".$row['Category_idCategory']."</td>"
			."<td>".$row['Name']."</td>"
			."<td>".$row['Price']."</td>"
			."<td>".$row['Designed_by']."</td>"
			."<td>".$row['Estimated_delivery_days']."</td>"
			."<td><img src=http://".$_SERVER['SERVER_NAME'].":"
					.$_SERVER['SERVER_PORT'].dirname($_SERVER['REQUEST_URI'])
					.$row['Image_path']."></td>" //TODO this is for localhost!1!
			."<td>".$row['Image_path']."</td>"
		."</tr>";
} 
echo "</table>";
// echo $_SERVER['SERVER_NAME'] ."</br>";
// echo $_SERVER['SERVER_PORT'] ."</br>";
// echo dirname(($_SERVER['REQUEST_URI'])) . "</br>";
// echo "<img src=http://localhost:8082/Webpages/imgproduct/product1.PNG> </br>";
?>
	</body>
</html>
