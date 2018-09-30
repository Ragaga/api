<?php


namespace App\Controllers;


use App\Services\BucketService;
use App\Services\ObjectService;

/**
 * Class ObjectController
 * @package App\Controllers
 * Взимодействие с объектами хранилища, можно реализовать по REST
 */
class ObjectController
{
    private $bucketService;
    private $objectService;

    private $bucket;

    public function __construct(BucketService $bucketService, ObjectService $objectService)
    {
        $this->bucketService = $bucketService;
        $this->objectService = $objectService;
    }

    public function middleware(Request $request){
        $this->bucket = $this->bucketService->getBucketByName($request->bucket_name);
    }

    public function actionList(Request $request){
        return $this->objectService->getListObjects($this->bucket, $request->path);
    }

    public function actionGet(Request $request){
        return $this->objectService->getObject($this->bucket, $request->path);
    }

    public function actionDelete(Request $request){
        return $this->objectService->deleteObject($this->bucket, $request->path);
    }

    public function actionCreate(Request $request){
        return $this->objectService->createObject($this->bucket, $request->object);
    }
}