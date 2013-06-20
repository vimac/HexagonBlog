<?php

namespace HexagonBlog\app\widget;

use Hexagon\widget\Widget;

class Tag extends Widget{
    
    public function execute($userData = NULL) {
        return ['_active' => 'home'];
    }
    
}