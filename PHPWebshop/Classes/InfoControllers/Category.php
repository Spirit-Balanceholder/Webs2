<?php
class Category{
	public function deleteCategoryByID($category_ID){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->AddWhere("idCategory", $category_ID);
		$res = $db->delete("Category");
	
		return $res;
	}
	
	/*
	 * //TODO
	 */
	public function editCategory($category_ID, $values){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->AddWhere ( "category_ID", $studID );
// 		$res = $db->update ( "category", array (
// 				"Firstname" => $values['Firstname'],
// 				"Middlename" => $values['Middlename'],
// 				"Surname" => $values['Surname'],
// 				"categorynumber" => $values['categorynumber'],
// 				"Email" => $values['Email']
// 		) );
		return $res;
	}
	
	/*
	 * //TODO Doesn't work yet
	 */
	public function getAllCategories()
	{
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->select("Category"); //TODO
	
		$res = $db->getResults();
	
		return $res;
	}
	
	public function getAllCategoriesWithoutID($category_ID)
	{
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->AddWhereCustom("WHERE idCategory !='$id'");
		$db->select("category","CONCAT_WS(' ',firstname,middlename,surname) as name_category");
	
		$res = $db->getResults();
	
		return $res;
	}
	
	public function getColumnNamescategoryInfo(){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
	
	}
	
	public function getEditcategoryByID($ID){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database ();
	
		$db->addwhere("category_id", $ID);
		$db->select("vwcategoryinfo");
	
		$res = $db->getResults ();
	
		return $res;
	}
	
	public function insertNewCategory($values){
		include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/Database.php';
		$db = new Database();
		$res = $db->insert("Category", array (
			$values ["type"],
			$values ["desc"]
		), array("Category_type", "Description"));
		
		return $res;
	}
}
?>