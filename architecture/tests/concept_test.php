<?php

require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../concept.php";

use App\Repository\{
  FileRepository,
  MySqlRepository,
  RedisRepository,
  CloudRepository,
};

$concept = new Concept(

  security: new CloudRepository(), // new RedisRepository(),

);
$concept->getUserData();
