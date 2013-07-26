<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;

class TagController extends Controller{
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->_bindValue('_active', 'tag');
    }
    
    public function index() {
        
    }
}