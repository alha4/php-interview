<?php

namespace App\Components;

final class SomeObjectSqS extends BaseComponent
{

  public function handle()
  {

    echo __CLASS__ . ' sqs handled' . PHP_EOL;
  }
}