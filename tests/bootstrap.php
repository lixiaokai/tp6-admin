<?php

namespace think;

include __DIR__ . '/../vendor/autoload.php';

$http = (new \think\App())->http;
$response = $http->run();
$http->end($response);
