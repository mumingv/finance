<?php
class Common_DaoBase {
    private $_db = null;
    protected $_table = null;

    /*
    * 构造函数
    *
    * @return  成功：  _db连接对象
    *          失败：  返回false
    **/
    public function __construct($cluster) {
        $this->_db = Bd_Db_ConnMgr::getConn($cluster);
    }

    /**
     * @brief ִsql执行
     *
     * @param $sql
     * @param $fetchType
     * @param bool|false $bolUseResult
     * @return mixed
     */
    public function execute($sql, $fetchType = Bd_DB::FETCH_ASSOC, $bolUseResult = false) {
        return $this->_db->query($sql, $fetchType, $bolUseResult);
    }

    /**
     * insert 
     * 成功返回：新插入行的ID；失败抛异常
     * @param mixed $fields 
     * @param mixed $options 
     * @param mixed $onDup 
     * @access public
     * @return void
     */
    public function insert($fields, $options=NULL, $onDup=NULL) {
        // 成功返回：影响行数；失败返回：false
        $res = $this->_db->insert($this->_table, $fields, $options, $onDup);
        if ($res === false) {
            Bd_Log::warning(__METHOD__.' '.$this->_db->errno().' '.$this->_db->error());
            throw new Exception($this->_db->error(), $this->_db->errno());
        } 
        // 将结果改写为：新插入行的ID
        $res = $this->_db->getInsertID();
        Bd_Log::notice('DaoBase SQL IS: '.$this->_db->getLastSql());
        return $res;
    }

    /**
     * 删除记录
     *
     * @return 成功： 影响行数
     * 失败： 返回false
     */
    public function delete($conds=NULL, $options=NULL, $appends=NULL) {
        $ret = $this->_db->delete($this->_table, $conds, $options, $appends);
        return $ret;
    }

    /*
     * 更新记录
     *
     * @return 成功： 影响行数
     * 失败： 返回false
    **/
    public function update($fields, $conds=NULL, $options=NULL, $appends=NULL) {
        $ret = $this->_db->update($this->_table, $fields, $conds, $options, $appends);
        return $ret;
    }

    /*
     * 查询记录
     *
     * @return 成功：查询结果
     * 失败： 返回false
     **/
    public function select($fields, $conds=NULL, $options=NULL, $appends=NULL,
                        $fetchType=Bd_DB::FETCH_ASSOC, $bolUseResult=false) {
        $ret = $this->_db->select($this->_table, $fields, $conds, $options, $appends, $fetchType, $bolUseResult);
        return $ret;
    }

    /*
     * 查询记录总数
     *
     * @return 成功： 记录总数 66
     * 失败： 返回false
     **/
    public function selectCount($conds=NULL, $options=NULL, $appends=NULL) {
        $ret = $this->_db->selectCount($this->_table, $conds, $options, $appends);
        return $ret;
    }

    /**
     * 获取刚插入记录id
     *
     * @return 成功： 新记录ID
     * 失败： 返回false
     */
    public function getInsertID() {
        $ret = $this->_db->getInsertID();
        return $ret;
    }
}

