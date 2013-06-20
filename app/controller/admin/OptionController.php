<?php

namespace HexagonBlog\app\controller\admin;

use Hexagon\controller\Controller;

class OptionController extends Controller{
    
    public function __construct($req, $res) {
        parent::__construct($req, $res);
        $this->bindValue('_active', 'option');
    }
    
    public function index() {
        
    }
}