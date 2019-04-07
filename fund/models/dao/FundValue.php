<?php
/**
 * @desc 基金净值表
 */

class Dao_FundValue extends Common_DaoBase
{
    public function __construct($fundCode){
        parent::__construct('ClusterAliYun');
        $this->_table = "fund_value_{$fundCode}";
    }   
}

