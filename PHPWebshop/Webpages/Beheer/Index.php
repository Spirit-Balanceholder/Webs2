<!DOCTYPE html>
<html>
<head>
<?php include '../Components/htmlHead.php'?>
</head>
<body>
	<?php include '../Components/Header.php'?>
	
	<div class="container">
		<div class="mainbody" style="padding-top:30px;">
			<form name="input" action="" method="post">
				<table>
					<tr>
						<td colspan=2 style="text-align: center;"><h3>Admin Login</h3></td>
					</tr>
					<tr>
						<td><b>Login Name:</b></td>
						<td><input class="form-control" name="Login" type="text" required /></td>
					</tr>
					<tr>
						<td><b>Password:</b></td>
						<td><input class="form-control" name="Password" type="Password" required /></td>
					</tr>
					<tr>
					<td></td>
					<td><input class="btn btn-default" type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
	<?php include '../Components/Footer.php'?>
</body>
</html>
