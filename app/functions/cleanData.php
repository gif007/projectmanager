<?php

function cleanData($arr)
{
    $cleaned_data = [];

    foreach($arr as $key => $value)
    {
        $cleaned_data[$key] = htmlspecialchars($value, ENT_QUOTES);
    }

    return $cleaned_data;
}