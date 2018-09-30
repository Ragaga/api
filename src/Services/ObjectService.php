<?php


namespace App\Services;


use App\Entities\Bucket;
use App\Entities\BucketInterface;
use App\Entities\StorageObject;
use App\Repositories\BucketRepositoryInterface;
use App\Repositories\ObjectRepositoryInterface;

class ObjectService
{
    private $objectRepository;
    private $bucketRepository;

    public function __construct(ObjectRepositoryInterface $objectRepository, BucketRepositoryInterface $bucketRepository)
    {
        $this->objectRepository = $objectRepository;
        $this->bucketRepository = $bucketRepository;
    }

    public function getListObjects(Bucket $bucket, string $path = '/')
    {
        return $this->objectRepository->getListObjects($bucket, $path);
    }

    public function getObject(Bucket $bucket, string $path)
    {
        return $this->objectRepository->getObject($bucket, $path);
    }

    public function createObject(Bucket $bucket, StorageObject $object)
    {
        $this->guardUniqueName($bucket, $object->getFullPath());
        return $this->objectRepository->save($bucket, $object);
    }

    public function deleteObject(Bucket $bucket, string $path)
    {
        $object = $this->objectRepository->getObject($bucket, $path);
        return $this->objectRepository->delete($bucket, $object);
    }

    private function guardUniqueName(Bucket $bucket, string $path)
    {
        if ($this->objectRepository->getObject($bucket, $path)) {
            throw new \DomainException('Name is not unique');
        }
    }
}