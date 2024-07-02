<?php

require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../concept.php";

/**
 * 
 * выбираем конкретную реализацию способа хранения токена
 * так же можем применить паттерн "Фабричный метод" который будет
 * инкапсулировать условия выбора реализации в зависимости от 
 * параметров "глобальной конфигурации" 
 * и возвращать конкретный объект репозитория
 * 
 */

use Aarchitecture\Repository\{
  FileRepository,
  MySqlRepository,
  RedisRepository,
  CloudRepository,
};

$concept = new Concept(

  security: new CloudRepository(), // new RedisRepository(),

);
$concept->getUserData();
