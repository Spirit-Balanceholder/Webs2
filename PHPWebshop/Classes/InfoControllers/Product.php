<?php
class Product{
	
	public function getAllProducts()
	{
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->select("Product");
	
		$res = $db->getResults();
	
		return $res;
	}
	
	/*
	 * //TODO not done
	 */
	public function insertNewProduct(){
		
	}
}
?>