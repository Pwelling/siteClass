<?php
/**
 * \brief Contains all system functions of the class
 * @author P.Welling
 * @since 2.0
 */
class Sys extends Vars {
	
	/**
	 * \brief Might become in handy....
	 * @author P.Welling
	 * @since 2.0
	 */
	function setVersion(){
		$bt =  debug_backtrace();
		$this->version = str_replace('.php','',basename($bt[0]['file'] ));
	}

	/**
	 * \brief Gets the named var from the GET- if not available, it returns false
	 * @author P.Welling
	 * @since 2.0
	 */
	function getVar($var){
		$return = (isset($_GET[$var])) ? trim($_GET[$var]) : false;
		return $return;
	}

	/**
	 * \brief Gets the named var from the POST- if not available, it returns false
	 * @author P.Welling
	 * @since 2.0
	 */
	function postVar($var){
		$return = (isset($_POST[$var])) ? $_POST[$var] : false;
		return $return;
	}
	

}

?>