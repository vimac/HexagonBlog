<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;
use HexagonBlog\app\model\Post;
use Hexagon\system\util\Pagination;
use Hexagon\system\result\Result;

class PostController extends Controller{
    
    /**
     * @var Post
     */
    public $post;
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->bindValue('_active', 'post');
        $this->post = Post::getInstance();
    }
    
    public function index($page = 1, $q = '') {
        $page = intval($page);
        $pageSize = 3;

        $total = $this->post->getPostCount();
        $posts = $this->post->getPosts($page, $pageSize);
        
        $template = '/admin/post/index?page=(page)';
        $extraParam = [];
        if (!empty($key)) {
            $template .= '&q=(keyword)';
            $extraParam['keyword'] = $q;
        }
        $pagination = new Pagination($template, $page, $pageSize, $total, $extraParam, '/admin/post/index');

        return Result::genPageResult(['posts' => $posts, 'pagination' => $pagination]);
    }
}