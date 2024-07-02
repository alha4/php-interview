<?php

namespace Aarchitecture\Handlers;

use Aarchitecture\Components\ObjectInterface;

final class QueueObjectHandler implements ObjectHandlerInterface
{

  public function handle(ObjectInterface $object): string
  {

    echo 'queue handled' . PHP_EOL;

    return 'queue';
  }
}
