<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;
use Hexagon\Context;
use HexagonBlog\app\model\PostModel;
use HexagonBlog\app\model\TagModel;
use Hexagon\system\util\Pagination;
use Hexagon\system\result\Result;
use Hexagon\system\security\Security;
use Michelf\Markdown;

class PostController extends Controller{
    
    /**
     * @var PostModel
     */
    public $postModel;
    
    /**
     * @var TagModel
     */
    public $tagModel;
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->postModel = PostModel::getInstance();
        $this->tagModel = TagModel::getInstance();
    }
    
    public function index($page = 1, $q = '', $type = 'post') {
        $page = intval($page);
        $pageSize = 10;

        $total = $this->postModel->getPostCount();
        $posts = $this->postModel->getPosts($page, $pageSize);
        
        $template = '/admin/post/index?page=(page)';
        $extraParam = [];
        if (!empty($key)) {
            $template .= '&q=(keyword)';
            $extraParam['keyword'] = $q;
        }
        $pagination = new Pagination($template, $page, $pageSize, $total, $extraParam, '/admin/post/index');

        $this->bindValue('posts', $posts);
        $this->bindValue('pagination', $pagination);
        $this->bindValue('_active', $type);
    }
    
    public function publish($type = 'post') {
        $this->bindValue('_active', $type);
        $this->bindValue('type', $type);
    }
    
    public function edit($id, $type = 'post') {
        $this->bindValue('_active', $type);
        $id = intval($id);
        
        $post = $this->postModel->getPost($id);
        $tags = $this->tagModel->getTagByPost($id);
        $tag = [];
        foreach ($tags as $t) {
            $tag[] = $t['name'];
        }
        
        $this->bindValue('post', $post);
        $this->bindValue('tag', implode(', ', $tag));
        $this->bindValue('type', $type);
    }
    
    public function preview($data = NULL) {
        return Result::genHTMLResult(Markdown::defaultTransform($data));
    }
    
    public function commit($title, $content, $tag, $order, $pid = NULL, $type = 'post') {
        $title = trim($title);
        $content = trim($content);
        $tag = trim($tag);
        $order = intval($order);
        isset($pid) && $pid = intval($pid);
        
        $uid = 1;
        $time = $_SERVER['REQUEST_TIME'];
        
        $tags = explode(',', $tag);
        foreach ($tags as &$t) {
            $t = trim($t);
        }
        
        $status = 0;
        
        if ($pid > 0) {
            $this->postModel->updatePost($pid, $title, $content, $uid, $type, $status, NULL, $order);
        } else {
            $pid = $this->postModel->insertPost($title, $content, $uid, $type, $status, NULL, $order);
        }
        
        if ($pid > 0) {
            $otagSet = $this->tagModel->getTagByPost($pid);
            
            $otags = [];
            foreach ($otagSet as $otag) {
                array_push($otags, $otag['name']);
            }
            $minus = array_diff($otags, $tags);
            $this->tagModel->updateTags($minus, $pid, -1);
            
            $plus = array_diff($tags, $otags);
            
            $ctagSet = $this->tagModel->getTags($plus);
            $itags = [];
            $utags = [];
            $ctags = [];
            foreach ($ctagSet as $ctag) {
                array_push($ctags, $ctag['name']);
            }
            
            foreach ($plus as $p) {
                if (in_array($p, $ctags)) {
                    array_push($utags, $p);
                } else {
                    array_push($itags, $p);
                }
            }
            
            $this->tagModel->updateTags($utags, $pid, 1);
            $this->tagModel->insertTags($itags, $pid);
        }
        
        $link = 'http://' . $this->request->getHostName() . '/post?id=' . $pid;
        $_SESSION['ADMIN_NOTIFICATION'] = sprintf('Post succeed, URL: <a href="%s">%s</a>', $link, $link);
        $_SESSION['ADMIN_NOTIFICATION_TYPE'] = 'success';
        
        if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            Result::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Result::redirect('/admin/post/index');
        }
        
        return Result::genNoneResult();
    }
    
    public function delete($pid) {
        foreach ($pid as $id) {
            $tags = $this->tagModel->getTagByPost($id);
            $tagNames = [];
            foreach ($tags as $tag) {
                $tagNames[] = $tag['name'];
            }
            $this->tagModel->updateTags($tagNames, $id, -1);
        }
        
        $this->postModel->deletePost($pid);
        
        Result::redirect('/admin/post/index');
        return Result::genNoneResult();
    }
}