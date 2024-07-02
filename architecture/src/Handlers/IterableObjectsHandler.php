<?php

namespace Aarchitecture\Handlers;

use Aarchitecture\Components\ObjectInterface;

final class IterableObjectsHandler implements ObjectHandlerInterface
{

  public function handle(ObjectInterface $object): string
  {

    echo __CLASS__ . PHP_EOL;

    return 'iterable';
  }
}
