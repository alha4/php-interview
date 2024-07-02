<?php

require_once __DIR__ . '/lib/helpers.php';

$array = [
  ["id" => 1, "date" => "12.01.2020", "name" => "test1"],
  ["id" => 2, "date" => "02.05.2020", "name" => "test2"],
  ["id" => 4, "date" => "08.03.2020", "name" => "test4"],
  ["id" => 1, "date" => "22.01.2020", "name" => "test1"],
  ["id" => 2, "date" => "11.11.2020", "name" => "test4"],
  ["id" => 3, "date" => "06.06.2020", "name" => "test3"],
];

/**
 * 1. уникальные записи (убрать дубли) в отдельный массив
 */
$uniqueArray = unique($array);
var_dump($uniqueArray);

/**
 * 2. сортировка по произвольному ключу
 */
sortBy($array, 'date');
var_dump($array);

/**
 * 3. вернуть из массива элементы по произвольному ключу и значению
 */
var_dump(findBy(['date' => '22.01.2020'], $array));

/**
 * 4. изменить в массиве значения и ключи
 */
var_dump(flipBy(['name' => 'id'], $array));
