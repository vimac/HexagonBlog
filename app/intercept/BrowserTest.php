<?php

namespace HexagonBlog\app\intercept;

use Hexagon\intercept\Rule;
use Hexagon\intercept\IPreRule;

class BrowserTest extends Rule implements IPreRule{
    
    public function pre() {
        if (stripos($this->request->getUserAgent(), 'msie 6') !== FALSE) {
            // do some msie6 hack or forbidden this browser
        }
    }
}