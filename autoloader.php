<?php
    function load(string $className):void 
    {
        include_once"$className.php" ;
    }
    spl_autoload_register('load');
?>