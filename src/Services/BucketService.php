<?php

namespace App\Services;

use App\Entities\Bucket;
use App\Repositories\BucketRepositoryInterface;

class BucketService
{
    private $bucketRepository;

    public function __construct(BucketRepositoryInterface $bucketRepository)
    {
        $this->bucketRepository = $bucketRepository;
    }

    public function getBucketByName(string $name)
    {
        return $this->bucketRepository->getByName($name);
    }
}