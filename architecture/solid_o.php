<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Components\{SomeObjectSqS, SomeObjectNats};

class SomeObjectsHandler
{

    public function handleObjects(array $objects): array
    {
        $handlers = [];

        foreach ($objects as $object) {

            $handlers[] = $object->handle();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObjectSqS('object_sqs'),
    new SomeObjectNats('object_nats'),
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);
