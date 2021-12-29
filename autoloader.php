<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    $class_name = $class_name . '.php';
    if (is_file($class_name))
        include $class_name;
});