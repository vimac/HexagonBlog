<?php

namespace HexagonBlog;

require('core/Framework.php');

use Hexagon\Framework;

const HEXAGON_APP_IN_MAINTENANCE = FALSE;

$hexagon = Framework::getInstance();

if (!HEXAGON_APP_IN_MAINTENANCE) {
    $hexagon->initApp(__NAMESPACE__, __DIR__)->run();
} else {
    $hexagon->initApp(__NAMESPACE__, __DIR__)->run('maintenance/index');
}