<?php

if (!isset($_POST['string']) || trim($_POST['string']) === '') {
    errorResponse();
}

$str = trim($_POST['string']);
$arr = str_split($str);
$count = 0;

foreach ($arr as $char) {
    if ($char === '(') {
        $count++;
    }

    if ($char === ')') {
        $count--;
    }

    if ($count < 0) {
        errorResponse();
    }
}

if ($count === 0) {
    successResponse();
}

errorResponse();

function successResponse()
{
    http_response_code(200);
    echo 'все ок';
    exit();
}

function errorResponse()
{
    http_response_code(400);
    echo 'ошибка';
    exit();
}