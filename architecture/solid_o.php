<?php

require_once __DIR__ . "/vendor/autoload.php";

/**
 * SomeObjectsHandler - можно применить паттерн "Стратегия" 
 * метод handleObjects закрыт от модицификации и открыт 
 * для расширения за счет возможности внедрения различных 
 * стратегии обработки объекта, не изменяя код исходного метода,
 * так же можно применить "Декоратор" для расширения поведения
 * метода handleObjects, либо "Шаблонный метод" если требуется
 * заменять определенный шаг алгоритма изнутри,
 * если задача связывать объекты и обработчики 
 * то подойдет паттерн "Цепочка обязанностей" либо "Медиатор"
 */

use Aarchitecture\Components\{SomeObjectSqS, SomeObjectNats};
use Aarchitecture\Handlers\{
    ObjectHandlerInterface,
    IterableObjectsHandler,
    QueueObjectHandler
};

class SomeObjectsHandler
{
    public function __construct(private ObjectHandlerInterface $strategy)
    {
    }

    public function handleObjects(array $objects): array
    {
        $handlers = [];

        foreach ($objects as $object) {

            $handlers[] = $this->strategy->handle($object);
        }

        return $handlers;
    }
}

$objects = [
    new SomeObjectSqS('object_sqs'),
    new SomeObjectNats('object_nats'),
];

$soh = new SomeObjectsHandler(
    strategy: new QueueObjectHandler() //new IterableObjectsHandle()
);
$soh->handleObjects($objects);
