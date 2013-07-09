<?php

namespace HexagonBlog\app\controller;

use Hexagon\controller\Controller;
use Hexagon\system\result\Result;

class AdminController extends Controller {
    
    public function login() {
    }
    
    public function doLogin($email = '', $password = '', $remember = '') {
        return Result::redirect('/admin/dashboard/index');
    }
    
    public function logout() {
        return Result::redirect('/');
    }
}