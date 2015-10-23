<?php

namespace CodeCommerce\Http\Controllers;
use CodeCommerce\MyS3;

class AwsController extends Controller
{
    public function putObj(MyS3 $myS3){

        $client = $myS3->client;
        $result = $client->putObject([
            'Bucket' => $myS3->bucket,
            'Key'    => 'data3.txt',
            'Body'   => 'Hello!',
            'ACL'    => 'public-read'
        ]);
        echo $result['ObjectURL'] . "\n";
    }

    public function getObj(MyS3 $myS3){
        $client = $myS3->client;
        $result = $client->getObjectUrl($myS3->bucket,'6.jpg');
        echo $result;
    }

}
