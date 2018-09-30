<?php


namespace App\Entities;


use App\Enitites\events\DeleteObjectEvent;

class StorageObject
{
    use EventTrait;

    const STATUS_DELETED = -1;

    public $path;
    public $name;
    public $status;

    public function getFullPath()
    {
        return $this->path . $this->name;
    }

    public function delete(){
        $this->status = self::STATUS_DELETED;
        $this->recordEvent(new DeleteObjectEvent($this));
    }
}