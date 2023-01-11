<?php
namespace App\Service;

class FileUploader
{

     protected $root;

     public function __construct(string $root)
     {
         $this->root = $root;
     }


      public function upload($from, $destination)
      {
           move_uploaded_file($from, $destination);
      }
}