<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;
use HexagonBlog\app\model\Post;
use Hexagon\system\util\Pagination;
use Hexagon\system\result\Result;
use Hexagon\system\security\Security;
use Hexagon\Context;

class PostController extends Controller{
    
    /**
     * @var Post
     */
    public $post;
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->post = Post::getInstance();
    }
    
    public function index($page = 1, $q = '', $type = 'post') {
        $page = intval($page);
        $pageSize = 10;

        $total = $this->post->getPostCount();
        $posts = $this->post->getPosts($page, $pageSize);
        
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
    }
    
    public function preview($data = NULL) {
        echo "<h3>Here will display preview.</h3>";
        return Result::genNoneResult();
    }
    
}