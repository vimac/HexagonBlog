<?php

namespace HexagonBlog\app\model;

use Hexagon\model\Model;
use Hexagon\system\db\DBAgent;

class UserModel extends Model {
    
    /**
     * @var DBAgent
     */
    protected $db;
    
    /**
     * @var UserModel
     */
    protected static $m;
    
    /**
     * @return UserModel
     */
    public static function getInstance() {
        if (!isset(self::$m)) {
            self::$m = new self();
        }
        return self::$m;
    }
    
    public function __construct() {
        $this->db = self::_getDBAgent();
    }
    
    public function getUserCount() {
        $db = $this->db;
        $sql = 'select count(*) as c from `user`';
        $r = $db->queryOne($sql);
        return $r['c'];
    }
    
    /**
     * @param int $page
     * @return array
     */
    public function getUsers($page, $size) {
        $db = $this->db;
        $sql = 'select * from `user` order by `uid` desc limit ?, ? ';
        $db->addStatementArgs([[($page - 1) * $size, DBAgent::PARAM_INT], [$size, DBAgent::PARAM_INT]]);
        $result = $db->query($sql);
        return $result;
    }
    
}