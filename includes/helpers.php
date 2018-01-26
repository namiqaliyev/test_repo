<?php

function read_input($param, $method = "get") {
    $_ARR = $_GET;
    if($method == "post") $_ARR = $_POST;
    return $_ARR[$param];
}