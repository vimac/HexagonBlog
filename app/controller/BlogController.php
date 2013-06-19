<?php

namespace HexagonBlog\app\controller;

use Hexagon\controller\Controller;
use Hexagon\system\result\Result;
use Hexagon\system\util\Pagination;
use HexagonBlog\app\model\Post;

class BlogController extends Controller {
    
    /**
     * @var Post
     */
    private $post;
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->post = Post::getInstance();
    }
    
    public function index($page = 1, $q = '') {
        $page = intval($page);
        $pageSize = 3;

        $total = $this->post->getPostCount();
        $posts = $this->post->getPosts($page, $pageSize);
        
        foreach ($posts as &$post) {
            $place = strpos($post['content'], '<!--MORE-->');
            if ($place !== FALSE) {
                $post['content'] = substr($post['content'], 0, strlen($post['content']) - $place);
                $post['content'] = str_replace('<!--MORE-->', '<p class="more-tag"><a href="/post?id=' . $post['pid'] . '">Click for full article&gt;&gt;</a></p>', $post['content']);
            }
        }
        
        $template = '/index?page=(page)';
        $extraParam = [];
        if (!empty($key)) {
            $template .= '&q=(keyword)';
            $extraParam['keyword'] = $q;
        }
        $pagination = new Pagination($template, $page, $pageSize, $total, $extraParam, '/', 10);

        /**
         * equals
         * $this->bindValue('posts', $posts);
         * $this->bindValue('pagination', $pagination);
         * and no return
         */
        return Result::genPageResult(['posts' => $posts, 'pagination' => $pagination]);
    }
    
    public function post($id = NULL) {
        $id = intval($id);
        $post = $this->post->getPost($id);
        $this->bindValue('post', $post);
    }
    
    public function page($seoName = NULL) {
        $id = intval($id);
        $post = $this->post->getPost($id);
        $this->bindValue('post', $post);
    }
    
}