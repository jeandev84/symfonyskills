<?php
namespace App\Packages\Filesystem\Contract;

interface NewFileWriter
{
     public function write($data): void;
}