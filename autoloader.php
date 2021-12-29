<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $class_name = ROOT.$class_name . '.php';
    echo $class_name;
    include $class_name ;
});