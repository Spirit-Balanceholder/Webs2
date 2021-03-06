<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/Classes/DatabaseConnectie/config.php';
class Database
{
	// hierin komen de select, delete, update functions
	public $con;
	private $result = array ();
	// databases.aii.avans.nl:3306/
	public $db_host = 'databases.aii.avans.nl:3306';
	public $db_user = 'mjong12';
	public $db_pass = '13795';
	public $db_name = "mjong12_db";
	private $where = null;
	private $query = null;
	private $limit = null;
	private $groupby = null;
	private $DISTINCT = false;
	
	/**
	 * Create a saver qrry to execute on the database (dit ga ik nog uitwerken)
	 * 
	 * @param unknown $qry        	
	 * @return unknown
	 */
	function __construct()
	{
		$this->connect ();
	}
	
	/**
	 * connectie maken met de database en returned of de connectie correct is.
	 *
	 * @return boolean
	 */
	private function connect()
	{
		// include 'MysqlConnectie.php';
		if (! $this->con)
		{
			$myconn = new mysqli ( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
			
			if ($myconn->connect_errno != 0)
			{
				die ( "Probleem bij connectie of database select" );
			}
			$this->con = $myconn;
		} else
		{
			// Echo "2 wel";
			return true;
		}
	}
	
	/**
	 *
	 * @return boolean
	 */
	private function disconnect()
	{
		if ($this->con)
		{
			if (! $this->con->errno == "0")
			{
				echo " <br>";
				echo "Error: " . $this->con->errno . ": " . $this->con->error . " <br>";
				echo "<br>qry runned while error: " . $this->getQuery () . " <br>";
			}
			$this->con->close ();
		}
	}
	
	/**
	 *
	 * @param unknown $table        	
	 * @return boolean
	 */
	private function tableExists($table)
	{
		$tablesInDb = @mysql_query ( 'SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"' );
		if ($tablesInDb)
		{
			if (mysql_num_rows ( $tablesInDb ) == 1)
			{
				return true;
			} else
			{
				return false;
			}
		}
	}
	
	/**
	 * Voer een select querry uit op de database
	 *
	 * @param unknown $table
	 *        	TESTTEXT
	 * @param string $rows        	
	 * @param string $where        	
	 * @param string $order        	
	 * @return boolean
	 */
	public function select($table, $rows = '*', $order = null)
	{
		if ($this->DISTINCT)
			$this->query = 'SELECT DISTINCT ' . $rows . ' FROM ' . $table;
		else
			$this->query = 'SELECT ' . $rows . ' FROM ' . $table;
			// Where
		if ($this->where != null)
			$this->query .= $this->where;
			// Order by
		if ($order != null)
			$this->query .= ' ORDER BY ' . $order;
			// group by
		if ($this->groupby != null)
			$this->query .= $this->groupby;
			// Limit
		if ($this->limit != null)
			$this->query .= $this->limit;
			// uitvoeren
			// echo $this->query;
		$resultSet = $this->con->query ( $this->query );
		//
		$this->result = $resultSet;
	}
	public function customquerry($qry)
	{
		$resultSet = $this->con->query ( $qry );
		//
		$this->result = $resultSet;
	}
	
	/**
	 *
	 * @param unknown $table        	
	 * @param unknown $values        	
	 * @param string $rows        	
	 * @return boolean
	 */
	public function insert($table, $values, $rows = null)
	{
		$insert = 'INSERT INTO ' . $table;
		//
		
		for($i = 0; $i < count ( $rows ); $i ++)
		{
			if (is_string ( $rows [$i] ))
				$rows [$i] = '' . $rows [$i] . '';
		}
		$rows = implode ( ',', $rows );
		$insert .= ' (' . $rows . ')';
		
		for($i = 0; $i < count ( $values ); $i ++)
		{
			if (is_string ( $values [$i] ))
			{
				if (strlen ( $values [$i] ) > 0)
				{
					$values [$i] = '"' . $values [$i] . '"';
				} else
				{
					$values [$i] = 'NULL';
				}
			}
		}
		$values = implode ( ',', $values );
		$insert .= ' VALUES (' . $values . ')';
		
		// echo $insert;
		
		//
		$this->query = $insert;
		$ins = $this->con->query ( $insert );
		$ID = $this->con->insert_id;
		//
		
		$this->disconnect ();
		
		if (! $ins)
			return false;
		else
			return $ID;
	}
	
	/**
	 *
	 * @param unknown $table        	
	 * @param string $where        	
	 * @return boolean
	 */
	public function delete($table)
	{
		if ($this->where == null)
		{
			return;
		} else
		{
			
			$delete = 'DELETE FROM ' . $table . $this->where;
		}
		// echo $delete;
		$this->query = $delete;
		$del = $this->con->query ( $delete ); // @mysqli_query ( $delete );
		                                      // echo $del;
		$this->disconnect ();
		return $del;
	}
	
	/**
	 *
	 * @param unknown $table        	
	 * @param unknown $rows        	
	 * @param unknown $where        	
	 * @return boolean
	 */
	public function update($table, $rows)
	{
		$update = 'UPDATE ' . $table . ' SET ';
		$keys = array_keys ( $rows );
		for($i = 0; $i < count ( $rows ); $i ++)
		{
			if (is_string ( $rows [$keys [$i]] ))
			{
				$update .= $keys [$i] . '="' . $rows [$keys [$i]] . '"';
			} else
			{
				$update .= $keys [$i] . '=' . $rows [$keys [$i]];
			}
			
			// Parse to add commas
			if ($i != count ( $rows ) - 1)
			{
				$update .= ',';
			}
		}
		
		$update .= $this->where;
		
		$this->query = $update;
		$query = $this->con->query ( $update );
		$this->disconnect ();
		return $query;
	}
	public function getResults()
	{
		$this->disconnect ();
		return $this->result;
	}
	public function getRowCount()
	{
		return $Rowcount;
	}
	
	/**
	 * 
	 * @param unknown $_field
	 * Veld naam vanuit de database
	 * @param unknown $_value
	 * @param string $_AndOr
	 * @param string $_OperatorNot
	 */
	public function AddWhere($_field, $_value, $_AndOr = 'and', $_OperatorNot = false)
	{
		$_Operator = " = ";
		if ($_OperatorNot)
		{
			$_Operator = " <> ";
		}
		if (empty ( $_value ))
			return;
		
		if (empty ( $this->where ))
			$this->where = " where " . $_field . " " . $_Operator . " '" . $_value . "'";
		else
			$this->where .= ' ' . $_AndOr . ' ' . $_field ." ". $_Operator . " '" . $_value . "'";
	}
	
	public function AddisDeleted()
	{
		if (empty ( $this->where ))
			$this->where = " where isDeleted = true ";
		else
			$this->where .= " and isDeleted = true ";
	}
	
	public function AddLike($_field, $_value, $_AndOr = 'and')
	{
		if (empty ( $_value ))
			return;
		
		if (empty ( $this->where ))
			$this->where = " where " . $_field . " like '%" . $_value . "%'";
		else
			$this->where .= ' ' . $_AndOr . ' ' . $_field . " like '%" . $_value . "%'";
	}
	public function AddLimit($_startAt, $_HowMuch)
	{
		if (empty ( $_startAt ) || empty ( $_HowMuch ))
			return;
		
		$this->limit = " LIMIT " . $_startAt . "," . $_HowMuch . " ";
	}
	public function AddGroupby($_ColumnName)
	{
		if (empty ( $_ColumnName ))
			return;
		
		$this->groupby = " GROUP BY " . $_ColumnName . " ";
	}
	public function useDistinct($bUse)
	{
		$this->DISTINCT = $bUse;
	}
	public function AddWhereCustom($_where)
	{
		if (empty ( $_where ))
			return;
		
		$this->where = " " . $_where;
	}
	
	/**
	 * Use this method at the end of a select,update, delete or create function.
	 */
	public function getQuery()
	{
		return $this->query;
	}
	
	/**
	 * Use this method at the end of a select,update, delete or create function.
	 */
	public function printQuery()
	{
		echo "Print Querry: " . $this->query;
		//
	}
}
?>