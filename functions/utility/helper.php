<?php

// Wrapper function for die and dump debugging.
function dd() {
    echo '<pre>';
    $args = func_get_args();
    foreach ($args as $arg){
        var_dump($arg);
    }
    echo '</pre>';
    die();
}

// Helper function to dump variables.
function dump() {
    echo '<pre>';
    $args = func_get_args();
    foreach ($args as $arg){
        var_dump($arg);
    }
    echo '</pre>';
}