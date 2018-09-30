<?php


namespace App\Repositories;


use App\Entities\Bucket;
use App\Entities\StorageObject;

interface ObjectRepositoryInterface
{
    public function getListObjects(Bucket $bucket, string $path);
    public function getObject(Bucket $bucket, string $path): StorageObject;
    public function save(Bucket $bucket, StorageObject $object);
    public function delete(Bucket $bucket, string $path);
}