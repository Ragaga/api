<?php


namespace App\Entities;


class StorageObject
{
    public $path;
    public $name;

    public function getFullPath()
    {
        return $this->path . $this->name;
    }
}