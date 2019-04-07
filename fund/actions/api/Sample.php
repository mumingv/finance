<?php
/**
 * @name Action_Sample
 * @desc sample api
 * @author mumingv@163.com
 */
class Action_Sample extends Saf_Api_Base_Action {

	/**
	 *
	 * @param input 
	 * @return result 
	 *
	 **/
	public function __execute(){
		$arrRequest = Saf_SmartMain::getCgi();
		$arrInput = $arrRequest['get'];
		$objServicePageSampleApi = new Service_Page_SampleApi();
		$arrPageInfo = $objServicePageSampleApi->execute($arrInput);
		return $arrPageInfo;
	}
	/**
	 *
	 * @param input 
	 * @return result 
	 *
	 **/
	public function __render($arrRes){
		echo json_encode($arrRes);
	}

	/**
	 *
	 * @param input 
	 * @return result 
	 *
	 **/
	public function __value($arrRes){
		echo json_encode($arrRes);
	}
}
