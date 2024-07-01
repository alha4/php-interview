<?php

namespace App\Components;

abstract class BaseComponent implements ObjectInterface
{

  protected $name;

  public function __construct(string $name)
  {
  }

  protected function getObjectName(): string
  {
    return __CLASS__ . ': ' . $this->name . PHP_EOL;
  }

  public function handle()
  {
    return $this->getObjectName();
  }
}
