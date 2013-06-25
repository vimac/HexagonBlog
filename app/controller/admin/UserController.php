<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;
use HexagonBlog\app\model\UserModel;
use Hexagon\system\util\Pagination;

class UserController extends Controller{
    
    /**
     * @var UserModel
     */
    public $userModel;
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->bindValue('_active', 'user');
        $this->userModel = UserModel::getInstance();
    }
    
    public function index($page = 1) {
        $page = intval($page);
        $pageSize = 10;
        
        $total = $this->userModel->getUserCount();
        $users = $this->userModel->getUsers($page, $pageSize);
        
        $template = '/admin/user/index?page=(page)';
        $extraParam = [];
        if (!empty($key)) {
            $template .= '&q=(keyword)';
            $extraParam['keyword'] = $q;
        }
        
        $pagination = new Pagination($template, $page, $pageSize, $total, $extraParam, '/admin/user/index');
        
        $this->bindValue('users', $users);
        $this->bindValue('pagination', $pagination);
    }
    
}