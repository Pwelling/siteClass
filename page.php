<?php
/**
 * 
 */
class Pages extends Debug {
	/**
	 * \brief Sets the pagegroup if the var is set in the url
	 * @author P.Welling
	 * @since 2.0
	 */
	function setPageGroup(){
		$pageGropupId = $this->getVar('pGroup');
	}
	
	function setPage(){
		$pageId = $this->getVar('pId');
		if($pageId !== false){
			$query_rs_getPage = sprintf("SELECT * FROM pageContent WHERE `pId`=%s",$this->GetSQLValueString($pageId,'int'));
			$rs_getPage = $this->doQueyr($query_rs_getPage,true);
		}
	}
	
}
?>