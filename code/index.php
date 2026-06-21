<?php
$redis = new Redis();

$redis->connect('redis');

$redis->set('my_key', 'Привет из Docker!');
echo $redis->get('my_key');

$memcached = new Memcached();
$memcached->addServer('memcached', 11211);

$memcached->set('test_key', 'Hello Memcached!');
echo $memcached->get('test_key');

try {
    $host = 'postgres';
    $db   = getenv('POSTGRES_DB');
    $user = getenv('POSTGRES_USER');
    $pass = getenv('POSTGRES_PASSWORD');

    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $stmt = $pdo->query('SELECT version();');
    echo 'Успех! Версия БД: ' . $stmt->fetchColumn();
} catch (Exception $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}