<?php

namespace HexagonBlog\app\intercept;

use Hexagon\intercept\Rule;
use Hexagon\intercept\IPreRule;
use HexagonBlog\app\model\OptionModel;

class BlogOptions extends Rule implements IPreRule{

    /**
     * @var OptionModel
     */
    private $optionModel;
    
    public function pre() {
        $this->optionModel = OptionModel::getInstance();
        $this->bindValue('_blogTitle', $this->optionModel->getOption('blogTitle'));
    }
}