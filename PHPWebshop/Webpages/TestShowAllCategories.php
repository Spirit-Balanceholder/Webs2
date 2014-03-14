<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Category.php';
$categoryInfo = new Category();
$result = $categoryInfo->getAllCategories();

echo "<table border='1'>";
echo "<tr>"
		."<th>CategoryID</th>"
		."<th>Category_type</th>"
		."<th>Description</th>"
	."</tr>";
while($row = $result->fetch_assoc()){
	echo "<tr>"
			."<td>".$row['idCategory']."</td>"
			."<td>".$row['Category_type']."</td>"
			."<td>".$row['Description']."</td>"
		."</tr>";
}
echo "</table>";

// while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
// echo "<tr>";
// foreach ($line as $col_value) {
// 	echo "<td>$col_value</td>";
// 	if ($col_value == end($line)){
		
// 	}
// }
// echo "\t</tr>\n";
// }
?>
