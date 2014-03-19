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
	

	public function getProductById($Id){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
		
		$db->addwhere("idProduct", $Id);
		$db->select("Product");
		
		$res = $db->getResults ();
		
		return $res;
	}
	

	/*
	 * //TODO not done
	 */
	public function insertNewProduct(){ //nog werkend maken, eerst in admin/product werken
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		if (! empty ($values)){
			$db = new Database ();
			$db->insert("Product",array(
					$values ["prodname"],
					$values ["price"],
					$values ["sdescription"],
					$values ["designed_by"],
					$values ["estimated_days"],
					$values ["ldescription"])
					, array ("Firstname", "Middlename", "Surname",
							"Studentnumber", "Email", "Location_ID"));
		}
	}
}
?>