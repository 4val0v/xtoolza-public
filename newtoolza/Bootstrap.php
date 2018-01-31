<?php

function __autoload($className)
{
    // не забывать в конце слэш
    // TODO: сделать автоскан
    $catalogs = array(
        '',
        'Actions/',
        'ConfigStack/',
        'HeaderStack/',
        'HeaderStack/Interfaces/',
        'HttpStack/',
        'HttpStack/Interfaces/',
        'IndexFiles/',
        'SeoStack/',
        'SeoStack/SeoTasks/',
        'SeoStack/Interfaces/'
    );

    foreach($catalogs as $catalog)
    {
        if(file_exists($catalog . $className . '.php'))
        {
            require_once($catalog . $className . '.php');
            return;
        }
    }
}