<?php

namespace HexagonBlog\app\intercept;

use Hexagon\intercept\Rule;
use Hexagon\intercept\IPreRule;
use HexagonBlog\app\model\Option;

class BlogOptions extends Rule implements IPreRule{

    /**
     * @var Options
     */
    private $o;
    
    public function pre() {
        $this->o = Option::getInstance();
        $this->bindValue('_blogTitle', $this->o->getOption('blogTitle'));
    }
}