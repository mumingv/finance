<?php
/**
 * @name Finance_Api_Fund_Interface
 * @desc sample api interface
 * @author mumingv@163.com
 */
interface Finance_Api_Fund_Interface{
	/**
	  * @param
	  * @return
	  **/
    	public function getSample(Finance_Api_Fund_Entity_ReqgetSample $req,
    						  Finance_Api_Fund_Entity_ResgetSample $res);
}

class Finance_Api_Fund_Entity_ReqgetSample extends Saf_Api_Entity{
	public $id = 0;
    public function __construct(){
    }
}
class Finance_Api_Fund_Entity_ResgetSample extends Saf_Api_Entity{
    public $errno = 0 ;
    public $data = null ;
    public function __construct(){
    }
}

