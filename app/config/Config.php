<?php

namespace HexagonBlog\app\config;

use Hexagon\config\BaseConfig;
use Hexagon\Context;

class Config extends BaseConfig {

    public $appName = 'HexagonBlog';
    public $appUrl = 'http://localhost/';
    
    public $database = [];
    public $logLevel = HEXAGON_LOG_LEVEL_PRODUCTION;
    
    public $logPath = ''; // empty for project logs directory
    public $logNameSuffix = '';
    public $logAppender = '\Hexagon\system\log\ErrorLogAppender';
    //public $logAppender = '\Hexagon\system\log\FileLogAppender';
    
    public $charset = 'UTF-8';

    public $uriProtocol = HEXAGON_URI_PROTOCOL_AUTO;
    public $uriDefault = '/blog/index';
    public $uriSuffix = '';
    //public $uriSuffix = '.html';
    
    public $errorHandler = '\Hexagon\system\error\BaseErrorHandler';
    
    public $csrfProtection = FALSE;
    public $csrfTokenName = '_hexagon_csrfp';
    
    public $encryptionKey = 'The answer to life, the universe and everything';
    
    public $cookieEncryption = TRUE;
    public $cookieLifetime = '1 hour';
    public $cookiePath = '/';
    public $cookieDomain = '';
    public $cookieSecure = FALSE;
    
    public $cipher = '\Hexagon\system\security\cipher\Rijndael256Cipher';
    public $cipherIv = '50a2fabfdd276f573ff97ace8b11c5f4';
    
    public $interceptRules = [];
    
    protected function __construct() {
        Context::registerNS('Michelf', Context::getResourcePath('HexagonBlog\app\lib\thirdparty\markdown'));
        
        $this->logNameSuffix = date('-Y-m-d') . '.php';
        
        $this->interceptRules['pre'] = [['/.*/', ['\HexagonBlog\app\intercept\BrowserTest', '\HexagonBlog\app\intercept\BlogOptions']]];
//         $this->interceptRules['post'] = [['/\/admin\/.*/', '\HexagonBlog\app\intercept\AdminNotification']];
        
        $this->database = [
            [
                'dsn' => 'sqlite:' . Context::$appBasePath . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'HexagonBlog.sqlite',
                'username' => NULL,
                'password' => NULL,
                'options' => []
            ]
        ];
    }
    
}