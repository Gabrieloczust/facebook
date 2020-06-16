<?php

function pd($obj)
{
    echo '<pre>';
    print_r($obj->getDecodedBody());
    echo '</pre>';
    die;
}

function dd($element)
{
    echo '<pre>';
    var_dump($element);
    echo '</pre>';
    die;
}
