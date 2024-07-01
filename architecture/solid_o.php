<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Components\{SomeObjectSqS, SomeObjectNats};
use App\Handlers\IterableObjectsHandler;
use App\Handlers\QueueObjectHandler;

/**
 * метод handleObjects закрыт от модицикации и открыт для расширения
 */
$objects = [
    new SomeObjectSqS('object_sqs'),
    new SomeObjectNats('object_nats'),
];

$iterable = new IterableObjectsHandler();
$iterable->handleObjects($objects);

$queue = new QueueObjecthandler();
$queue->handleObjects($objects);
