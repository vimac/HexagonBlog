<?php

namespace HexagonBlog\app\model;

use Hexagon\model\Model;
use Hexagon\system\db\DBAgent;

class TagModel extends Model {

    /**
     * @var DBAgent
     */
    protected $db;

    /**
     * @var TagModel
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
        $this->db = self::_getDBAgent();
    }
    
    public function getTagByPost($pid) {
        $db = $this->db;
        $sql = 'select `tag`.tid, `tag`.name from `tag` left join `tag_post` `tp` on `tp`.tid=`tag`.tid where `tp`.pid = ?';
        $db->addStatementArg($pid);
        return $db->query($sql);
    }
    
    public function getTags(array $tagNames) {
        $db = $this->db;
        $count = count($tagNames);
        if ($count > 0) {
            $markers = str_repeat('?,', $count - 1) . '?';
            $sql = 'select * from `tag` where `name` in (' . $markers . ')';
            foreach ($tagNames as $name) {
                $db->addStatementArg($name);
            }
            return $db->query($sql);
        } else {
            return [];
        }
    }
    
    public function updateTags(array $tagNames, $pid, $c) {
        $db = $this->db;
        $count = count($tagNames);
        if ($count > 0) {
            $markers = str_repeat('?,', $count - 1) . '?';
            $sql = 'update `tag` set `count` = `count` + ? where `name` in (' . $markers . ')';
            $db->addStatementArg($c, DBAgent::PARAM_INT);
            foreach ($tagNames as $name) {
                $db->addStatementArg($name);
            }
            $lines = $db->executeUpdate($sql);
            
            if ($lines > 0) {
                $tagSet = $this->getTags($tagNames);
                $ctags = [];
                foreach ($tagSet as $t) {
                    $ctags[] = $t['tid'];
                }
                if ($c > 0) {
                    $lines = 0;
                    $time = $_SERVER['REQUEST_TIME'];
                    $sql = 'insert into `tag_post` (`tid`, `pid`, `ctime`) values (?,?,?)';
                    foreach ($ctags as $tid) {
                        $db->addStatementArg($tid);
                        $db->addStatementArg($pid);
                        $db->addStatementArg($time);
                        $lines += $db->executeUpdate($sql);
                    }
                } else {
                    $lines = 0;
                    $sql = 'delete from `tag_post` where `tid` = ? and `pid` = ?';
                    foreach ($ctags as $tid) {
                        $db->addStatementArg($tid);
                        $db->addStatementArg($pid);
                        $lines += $db->executeUpdate($sql);
                    }
                }
            }
            return $lines;
        } else {
            return ;
        }
    }
    
    public function insertTags(array $tagNames, $pid) {
        $db = $this->db;
        $time = $_SERVER['REQUEST_TIME'];
        
        $sql = 'insert into `tag` (`name`, `count`, `mtime`) values (?,1,?)';
        $ids = [];
        foreach ($tagNames as $name) {
            $db->addStatementArg($name);
            $db->addStatementArg($time);
            if ($db->executeUpdate($sql)) {
                $ids[] = $db->lastInsertId;
            }
        }
        
        $sql = 'insert into `tag_post` (`tid`, `pid`, `ctime`) values (?,?,?)';
        $lines = 0;
        foreach ($ids as $tid) {
            $db->addStatementArg($tid);
            $db->addStatementArg($pid);
            $db->addStatementArg($time);
            $lines += $db->executeUpdate($sql);
        }
        return $lines;
    }

}