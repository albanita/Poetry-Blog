<?php

function controllers_autoload($clase){
    include 'Controllers/'.$clase.'.php';
}

spl_autoload_register('controllers_autoload');