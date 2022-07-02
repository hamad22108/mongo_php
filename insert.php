<?php
require 'vendor/autoload.php';
try {
   if($_POST['name']) {
      $data = $_POST;

      $client = new MongoDB\Client(
            'mongodb://127.0.0.1:27017/test?retryWrites=true&w=majority'
         );
      // echo $client;
      $collection = $client->powned->test;

      $insertOneResult = $collection->insertOne($data);

      // printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

      // var_dump($insertOneResult->getInsertedId());
      return ['status'=>200,'data' => $insertOneResult];
   }
   else {
      return ['status' => 402, 'msg'=>'name is required'];
   }
   
} catch (\Throwable $th) {
   echo $th;
}


