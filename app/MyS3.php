<?php

namespace CodeCommerce;
use Aws\S3\S3Client;

class MyS3 extends S3Client
{
    public $client;
    public $bucket;
    public function __construct(){
        $this->bucket = 'code-commerce/ProductsImages';
        $this->client = S3Client::factory(array(
            'credentials' => array(
                'key'    => env('AWS_KEY'),
                'secret' => env('AWS_SECRET_KEY'),
            )
        ));
    }

}
