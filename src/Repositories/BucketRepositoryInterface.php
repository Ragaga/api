<?php


namespace App\Repositories;


interface BucketRepositoryInterface
{
    public function getByName(string $name);
}