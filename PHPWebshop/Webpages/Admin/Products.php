<!DOCTYPE html>
<html>
	<head>
		<title>Create Product</title>
		<?php include '../Components/htmlHead.php'?>
	</head>
<body>
	<?php include 'Custom/Header.php'?>
	
	<div class="container">
		<div class="mainbody" style="padding-top:30px;">
		<h2>
			Create Product
		</h2>
			<form method='post' action=''>
				<table>
					<tr><td>
					<?php
					include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Category.php';
					$categoryChoice = new Category();
					$resultCategory = $categoryChoice->getAllCategories();
					
					echo '<b>Category:</b></td><td> <select class="form-control form-item-30D" name="idCategory">'; //Choose_category_ID
					while ( $rowCate = $resultCategory->fetch_assoc () )
					{
						echo '<option value' . $rowCate ["idCategory"] . '>' . $rowCate ["Category_type"] . '</option> '; //TODO
					}
					echo '</select>';
					?>
					</td>
					<tr><td><label>Name:</label></td><td><input type='text' name='prodname' required/></td></tr>
					<tr><td><label>Price:</label></td><td><input type='number' name='price' required/></td></tr>
					<tr><td><label>Thumbnail info:</label></td><td><input type = text name="sdescription"></td></tr>
					<tr><td><label>Designed by:</label></td><td><input type='text' name='designed_by'/></td></tr>
					<tr><td><label>Estimated delivery days:</label></td><td><input type='number' name='estimated_days'/></td></tr>
					<tr><td><label>Description:</label></td><td><textarea name="ldescription" cols="50" rows="8"></textarea></td></tr>
					<tr><td><label>Product specifics:</label></td><td><textarea name="lspecifics" cols="50" rows="5"></textarea></td></tr>
					<tr><td><input class="btn btn-default" type="submit" value="Insert Product"></td>
					<td><a class="btn btn-default" style="margin:5px;" href="index.php">Back to view</a></td></tr>
				</table>
			</form>
		</div>
	</div>
	
	<?php include '../Components/Footer.php'?>
</body>
<?php
if (isset ($_POST ['prodname']) && isset ($_POST ['price']))
{
	include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/InfoControllers/Product.php';
	$info = new Product();
	$info->insertNewProduct($_POST);
	echo "<p><b>Saved Changes!</b></p>";
}
?>
</html>
