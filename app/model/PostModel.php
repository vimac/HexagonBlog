<?php

namespace HexagonBlog\app\model;

use Hexagon\model\Model;
use Hexagon\system\db\DBAgent;

class PostModel extends Model {
    
    /**
     * @var DBAgent
     */
    protected $db;
    
    /**
     * @var PostModel
     */
    protected static $m;
    
    /**
     * @return PostModel
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
    
    public function insertPost($title, $content, $uid, $type, $status, $parent = NULL, $order = NULL) {
        $db = $this->db;
        $time = $_SERVER['REQUEST_TIME'];
        $sql = 'insert into `post` (`title`,`content`,`uid`,`type`,`status`,`parent`,`order`,`ctime`,`mtime`) values (?,?,?,?,?,?,?,?,?)';
        $db->addStatementArgs([$title, $content, $uid, $type, $status, $parent, $order, $time, $time]);
        $r = $db->executeUpdate($sql);
        if ($r) {
            return $db->lastInsertId;
        } else {
            return NULL;
        }
    }
    
    public function updatePost($pid, $title, $content, $uid, $type, $status, $parent = NULL, $order = NULL) {
        $db = $this->db;
        $time = $_SERVER['REQUEST_TIME'];
        $sql = 'update `post` set `title` = ?, `content` = ?, `uid` = ?, `type` = ?, `status` = ?, `parent` = ?, `order` = ?, `mtime` = ? where `pid` = ?';
        $db->addStatementArgs([$title, $content, $uid, $type, $status, $parent, $order, $time, $pid]);
        return $db->executeUpdate($sql);
    }
    
    public function deletePost($pid) {
        $db = $this->db;
        if (!is_array($pid)) {
            $pid = [$pid];
        }
        $sql = 'delete from `post` where `pid` in (' . str_repeat('?,', count($pid) - 1) . '?)';
        foreach ($pid as $id) {
            $db->addStatementArg($id);
        }
        return $db->executeUpdate($sql);
    }
}