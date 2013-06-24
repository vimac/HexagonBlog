<?php

namespace HexagonBlog\app\widget\admin;

use Hexagon\widget\Widget;

class Notification extends Widget {
    
    public function execute($userData = NULL) {
        if (isset($_SESSION['ADMIN_NOTIFICATION'])) {
            $notification = $_SESSION['ADMIN_NOTIFICATION'];
            $notificationType = $_SESSION['ADMIN_NOTIFICATION_TYPE'];
        } else {
            $notification = NULL;
            $notificationType = NULL;
        }
        unset($_SESSION['ADMIN_NOTIFICATION']);
        unset($_SESSION['ADMIN_NOTIFICATION_TYPE']);

        return ['_notification' => $notification, '_notificationType' => $notificationType];        
       
    }
}