<?php


namespace App\Controllers;


use App\Services\BucketService;
use App\Services\ObjectService;

class BucketController
{
    private $bucketService;
    private $objectService;

    public function __construct(BucketService $bucketService, ObjectService $objectService)
    {
        $this->bucketService = $bucketService;
        $this->objectService = $objectService;
    }

    public function actionList(Request $request){
        return $this->objectService->getListObjects($request->bucket, $request->path);
    }

    public function actionGet(Request $request){
        return $this->objectService->getObject($request->bucket, $request->path);
    }

    public function actionDelete(Request $request){
        return $this->objectService->deleteObject($request->bucket, $request->path);
    }

    public function actionCreate(Request $request){
        return $this->objectService->createObject($request->bucket, $request->object);
    }
}