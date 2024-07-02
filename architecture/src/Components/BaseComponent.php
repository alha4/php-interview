<?php

namespace Aarchitecture\Components;

abstract class BaseComponent implements ObjectInterface
{

  public function __construct(protected readonly string $name)
  {
  }

  protected function getObjectName(): string
  {
    return __CLASS__ . ': ' . $this->name . PHP_EOL;
  }
}
