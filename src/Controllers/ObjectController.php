<?php


namespace App\Controllers;


use App\Services\BucketService;
use App\Services\ObjectService;

/**
 * Class ObjectController
 * @package App\Controllers
 * Взимодействие с объектами хранилища, можно реализовать по REST
 */

/**
 * @SWG\Info(title="S3 TEST API", version="0.01")
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

    /**
     * @SWG\Get(
     *     path="/api/{bucket_name}/object/list/{path}",
     *     @SWG\Parameter(name="bucket_name", in="path", required=true, type="string"),
     *     @SWG\Parameter(name="path", in="path", required=true, type="string", default="/"),
     *     @SWG\Response(
     *          response="200",
     *          description="List of storage objects in bucket folder"
     *      )
     * )
     */
    public function actionList(Request $request){
        return $this->objectService->getListObjects($this->bucket, $request->path);
    }

    /**
     * @SWG\Get(
     *     path="/api/{bucket_name}/object/get/{path}",
     *     @SWG\Parameter(name="bucket_name", in="path", required=true, type="string"),
     *     @SWG\Parameter(name="path", in="path", required=true, type="string"),
     *     @SWG\Response(
     *          response="200",
     *          description="Return storage object by path"
     *      )
     * )
     */

    public function actionGet(Request $request){
        return $this->objectService->getObject($this->bucket, $request->path);
    }

    /**
     * @SWG\Delete(
     *     path="/api/{bucket_name}/object/delete/{path}",
     *     @SWG\Parameter(name="bucket_name", in="path", required=true, type="string"),
     *     @SWG\Parameter(name="path", in="path", required=true, type="string"),
     *     @SWG\Response(
     *          response="200",
     *          description="Delete object in bucket by path"
     *      )
     * )
     */
    public function actionDelete(Request $request){
        return $this->objectService->deleteObject($this->bucket, $request->path);
    }

    /**
     * @SWG\Post(
     *     path="/api/{bucket_name}/object/create",
     *     consumes={"multipart/form-data", "application/x-www-form-urlencoded"},
     *     @SWG\Parameter(name="bucket_name", in="path", required=true, type="string"),
     *     @SWG\Parameter(name="file", in="formData", type="file", required=true, ),
     *     @SWG\Response(
     *          response="200",
     *          description="Create object "
     *      )
     * )
     */
    public function actionCreate(Request $request){
        return $this->objectService->createObject($this->bucket, $request->object);
    }
}