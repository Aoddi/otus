<?php

session_start();

$_SESSION['counter'] = ($_SESSION['counter'] ?? 0) + 1;

echo "Host: " . gethostname() . PHP_EOL;
echo "Counter: " . $_SESSION['counter'];

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
    echo 'все ок! host: ' . gethostname();
    exit();
}

function errorResponse()
{
    http_response_code(400);
    echo 'ошибка';
    exit();
}