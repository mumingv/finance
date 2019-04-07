<?php
/**
 * @file imortFundValueToMysql.php
 * @author mumingv
 * @date 2019-04-07
 * @brief 基金净值数据导入数据库
 */

Bd_Init::init();
ini_set('memory_limit', '1024M');
set_time_limit(0);
date_default_timezone_set('PRC');

define("VENDOR_DIR", ROOT_PATH . '/php/vendor');
if (file_exists(VENDOR_DIR.'/autoload.php')){
    require(VENDOR_DIR.'/autoload.php');
}

class ImortFundValueToMysql {

    private $fundCode = 160505;  // 博时主题
    private $fundFileName = 'fund_160505.txt';

    /**
     * __construct
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->daoFundValue = new Dao_FundValue($this->fundCode);
    }

    /**
     * run
     * @access public
     * @return void
     */
    public function run() {
        $this->fundFile = ROOT_PATH . "/app/finance/data/{$this->fundFileName}";
        $file = file_get_contents($this->fundFile);
        $lines = explode("\n", $file);
        foreach ($lines as $line) {
            list($date, $currentValue, $totalValue, $x, $y, $z, $bonusValue) = explode("\t", $line);
            if (empty($date)) continue;

            $fields = array(
                'date' => $date,
                'current_value' => floatval($currentValue),
                'total_value' => floatval($totalValue),
                'bonus_value' => $bonusValue ? floatval($bonusValue) : 0,
                'is_del' => 0,
            );
            try {
                $insertId = $this->daoFundValue->insert($fields);
                echo "insertId is {$insertId}.\n";
            } catch(Exception $e) {
                echo "ErrCode: ".$e->getCode().", ErrMsg: ".$e->getMessage()."\n";
            }
        }
    }
}

try {
    $obj= new ImortFundValueToMysql();
    $obj->run();
} catch (Exception $e) {
    echo "ErrCode: ".$e->getCode()."  ErrMsg: ".$e->getMessage() . "\n";
}

exit(0);
