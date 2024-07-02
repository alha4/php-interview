<?php
enum ERRORS: string
{
  case KEY_NOT_FOUND = 'Key not found';
  case INVALID_KEYMAP = 'Invalid keymap';
};
function unique(array $array): array
{

  $duplicate = [];

  return array_filter($array, static function ($item) use (&$duplicate) {

    if (!in_array($item['id'], $duplicate, true)) {

      array_push($duplicate, $item['id']);

      return true;
    }

    return false;
  }, ARRAY_FILTER_USE_BOTH);
}
function sortBy(array &$array, string $key): void
{
  if (!array_key_exists($key, $array[0])) {

    throw new \Exception(\ERRORS::KEY_NOT_FOUND->value);
  }

  usort($array, static function ($a, $b) use ($key) {

    if ($key == 'date') {

      return strtotime($b[$key]) <=> strtotime($a[$key]);
    }
    return $a[$key] <=> $b[$key];
  });
}
function findBy(array $filter, array $array): array
{

  $key = key($filter);
  $value = current($filter);

  if (!array_key_exists($key, $array[0])) {

    throw new \Exception(\ERRORS::KEY_NOT_FOUND->value);
  }

  return array_filter($array, static function ($item) use ($key, $value) {

    return $item[$key] == $value;
  }, ARRAY_FILTER_USE_BOTH);
}
function flipBy(array $keymap, array $array): array
{

  $flipKey = key($keymap);

  $flipValue = current($keymap);

  if (!array_key_exists($flipKey, $array[0])) {

    throw new \Exception(\ERRORS::INVALID_KEYMAP->value);
  }

  return array_map(static function ($item) use ($flipKey, $flipValue) {

    return [$item[$flipKey] => $item[$flipValue]];
  }, $array);
}
