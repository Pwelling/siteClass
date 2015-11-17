<?php
/**
 * \brief Stores all debug functions
 * @author P.Welling
 * @since 2.0
 */
class Debug extends Sys{
	function pre($arr){
		return '<pre>'.print_r($arr,true).'</pre>'; 
	}
}
?>