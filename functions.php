<?php



function dd($val) {
    // Helper function that displays raw data as html
    echo '<pre>';
    die(var_dump($val));
    echo '<pre>';
}