<?php
$config = require __DIR__ . '/../config/common.php';
require __DIR__ . '/../core/application.php';
$app = new Application($config);
print $app->exec();