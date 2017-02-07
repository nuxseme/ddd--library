<?php
/**
 *  Copyright (c) nuxse
 */

function __autoload($class){
    include __DIR__.'\\..\\src\\'.$class.'.php';
}

spl_autoload_register('__autoload');

