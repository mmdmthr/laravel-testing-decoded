<?php

// require_once 'vendor/laravel/framework/src/Illuminate/Foundation/helpers.php';

function link_to($url, $body, $parameters = null)
{
    $url = 'http://:/'.$url;
    $attributes = '';

    // If the user specified any parameters, then
    // parse them and append to returned string
    if ($parameters) {
        foreach ($parameters as $attribute => $value) {
            $attributes .= " {$attribute}='{$value}'";
        }
    }

    return "<a href='{$url}'{$attributes}>{$body}</a>";
}
