<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


trait SoftDeletes
{

    /**
     * @ORM\Column(type="datetime", nullable=true)
    */
    private $deletedAt;



    /**
     * @return bool
    */
    public function isDeleted(): bool
    {
         return ! empty($this->deletedAt);
    }
}