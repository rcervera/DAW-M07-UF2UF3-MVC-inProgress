<?php

class controldefault {

    function __construct() {
        
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?control=controllogin');
            exit;
        } 
    }
    
    public function index() {
        include_once 'vistes/templates/header.php';
        include_once 'vistes/default/principal.php';
        include_once 'vistes/templates/footer.php';
    }

}

?>
