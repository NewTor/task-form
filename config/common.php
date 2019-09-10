<?php
$params = require __DIR__ . '/param.php';
$db = require __DIR__ . '/db.php';
$config = [
    'params' => $params,
    'db' => $db
];

return $config;