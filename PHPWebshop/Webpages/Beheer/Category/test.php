<?php

echo "<div><form method='post' action=''><table>";
echo "<tr><td><input type='hidden' name='type' value='jewelry'></td></tr>";
echo "<tr><td><input type='hidden' name='desc' value='Much jewels, very jewelry.'></td></tr>";
echo "</table></form></div>";

?>

<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Category.php';

$info = new Category();
$info->insertNewCategory($_POST);
echo "</br>" . $category_type . " served.";
?>