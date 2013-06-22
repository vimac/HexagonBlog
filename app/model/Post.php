<?php

namespace HexagonBlog\app\model;

use Hexagon\model\Model;
use Hexagon\system\db\DBAgent;

class Post extends Model {
    
    /**
     * @var DBAgent
     */
    protected $db;
    
    /**
     * Post
     */
    protected static $m;
    
    /**
     * @return Post
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
    
    public function getPostCount($type = 'post') {
        $db = $this->db;
        $sql = 'select count(*) as c from `post` where `type` = ?';
        $db->addStatementArg($type);
        $r = $db->queryOne($sql);
        return $r['c'];
    }
    
    /**
     * @param int $page
     * @return array
     */
    public function getPosts($page, $size, $type = 'post') {
        $db = $this->db;
        $sql = 'select p.*, u.name, u.email from `post` p left join `user` u on u.`uid` = p.`uid` where p.`status` = 0 and p.`type` = ? order by `pid` desc limit ?, ? ';
        $db->addStatementArgs([[$type, DBAgent::PARAM_STR], [($page - 1) * $size, DBAgent::PARAM_INT], [$size, DBAgent::PARAM_INT]]);
        $result = $db->query($sql);
        return $result;
    }
    
    /**
     * @param int $id
     */
    public function getPost($id) {
        $db = $this->db;
        $sql = 'select p.*, u.name, u.email from `post` p left join `user` u on u.`uid` = p.`uid` where p.`pid` = ?';
        $db->addStatementArg($id);
        $result = $db->queryOne($sql);
        return $result;
    }
}