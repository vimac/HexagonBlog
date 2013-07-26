<?php

namespace HexagonBlog\app\controller;

use Hexagon\controller\Controller;

class AdminController extends Controller {
    
    public function login() {
    }
    
    public function doLogin($email = '', $password = '', $remember = '') {
        return self::_redirect('/admin/dashboard/index');
    }
    
    public function logout() {
        return self::_redirect('/');
    }
}