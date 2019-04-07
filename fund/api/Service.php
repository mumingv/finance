<?php
/**
 * @name Service
 * @desc sample api Service
 * @author mumingv@163.com
 */
class Finance_Api_Fund_Service extends Saf_Api_Service implements Finance_Api_Fund_Interface{
	public function __construct(){
		parent::__construct('fund');
		$this->oe = "utf-8";
	}
	/**
	  * 
	  * @param req
	  * @param res
	  * @return true/false
	  **/
    public function getSample(Finance_Api_Fund_Entity_ReqgetSample $req,
    						  Finance_Api_Fund_Entity_ResgetSample $res){
		$arrInput = $req->toArray();
		/*  
		 *           此处添加arrParms的keys到PageServeice的参数的隐射
		 *           默认不做隐射
		 *           arrInput = array('versionId' => 111);
		 *           eg: $arrParam['Id'] = $arrInput['versionId'];
		 **/
		$arrInput['method']=__FUNCTION__;

		$strUrl = "fund/api/sample?fromapi=1";
		$strPageService = "Service_Page_SampleApi";
		$arrOutput = null;

		$arrRes = $this->execute($arrInput, $arrOutput, $strPageService, $strUrl, 'get');
		if($arrRes !== false)
		{   
			$res->loadFromArray($arrRes);
			if($res !== false){
				return $res;
			}else{
				return null;
			}	
		}   
		return false;
	}
}

