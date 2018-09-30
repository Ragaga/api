<?php


namespace App\Enitites\events;


use App\Entities\StorageObject;

class DeleteObjectEvent
{
    public $object;

    public function __construct(StorageObject $object)
    {
        $this->object = $object;
    }
}