<?php

namespace Aarchitecture\Handlers;

use Aarchitecture\Components\ObjectInterface;

interface ObjectHandlerInterface
{
  public function handle(ObjectInterface $object): mixed;
}
