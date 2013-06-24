<?php

namespace HexagonBlog\app\model;

use Hexagon\model\Model;
use Hexagon\system\db\DBAgent;

class OptionModel extends Model {
    
    /**
     * @var DBAgent
     */
    protected $db;
    
    /**
     * @var OptionModel
     */
    protected static $m;
    
    /**
     * @return OptionModel
     */
    public static function getInstance() {
        if (!isset(self::$m)) {
            self::$m = new self();
        }
        return self::$m;
    }
    
    public function __construct() {
        $this->db = self::getDBAgent();
    }
    
    public function getOptions() {
        $db = $this->db;
        $sql = 'select * from `option`';
        return $db->query($sql);
    }
    
    public function getOption($name) {
        $db = $this->db;
        $sql = 'select * from `option` where `key` = ?';
        $db->addStatementArg($name);
        $r = $db->queryOne($sql);
        
        if ($r) {
            return $r['value'];
        } else {
            return '';
        }
    }
    
    public function setOption($key, $val) {
        $db = $this->db;
        $sql = 'replace into `option` (`key`, `value`, `mtime`) values (?,?,?)';
        $db->addStatementArgs([$key, $val, $_SERVER['REQUEST_TIME']]);
        return $db->executeUpdate($sql);
    }
    
    
    
}