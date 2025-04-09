<?php
    function load(string $className):void 
    {
        include_once"class/$className.php" ;
    }
    spl_autoload_register('load');
?>