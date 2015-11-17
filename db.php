<?php
/**
 * \brief Class to connect to the Database and execute queries
 * @author P.Welling
 * @since 2.0
 */
class db extends Pages{
	/**
	 * \brief Sets the database to be used
	 * @author P.Welling
	 * @since 2.0
	 */
	function setDb($db){
		$this->db = $db;
	}
	
	/**
	 * \brief Checks if there is a connection to the server and makes it if needed, then selects the designated Database.
	 * @author P.Welling
	 * @since 2.0
	 */
	function selectDb(){
		if($this->conn !== false){ //If there is a connection, check if it is still alive. If not, set the conn to false.
			if(!mysql_ping($this->conn)){
				$this->conn = false;
			}
		}
		if($this->conn === false){ //If conn is false, the make a connection to the server
			$this->conn = mysql_connect($this->dbServer,$this->dbUser,$this->dbPass);
			$this->dbSet = false;
		}
		if($this->dbSet === false){//If the db hasn't been set, then select it.
			mysql_select_db($this->db,$this->conn);
			$this->dbSet = true;
		}
	}
	
	/**
	 * \brief Executes the given Query and if requested, returns the dataset
	 * @author P.Welling
	 * @since 2.0
	 */
	function doQuery($query,$retRes){
		$this->selectDb();
		$rs_result = mysql_query($query,$this->conn);
		if($retRes === true){
			return $rs_result;
		}
	}

	/**
	 * \brief We all know this function from Dreamweaver....
	 * @author Adobe
	 * @since a long time ago.....
	 */
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
		switch ($theType) {
			case "text":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;    
			case "long":
			case "int":
				$theValue = ($theValue != "") ? intval($theValue) : "NULL";
				break;
			case "double":
				$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
				break;
			case "date":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
			case "defined":
				$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
				break;
		}
		return $theValue;
	}
}
?>