<?php

function autoload($className)
{
    $fileName = 'Classes'. DIRECTORY_SEPARATOR . $className . '.php';

    if (file_exists($fileName)) {
        require $fileName;
    } else {
        exit("The class hasn't been found");
    }
}

spl_autoload_register('autoload');