<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


trait Timestamps
{

    /**
     * @ORM\Column(type="datetime")
    */
    private $createdAt;



    /**
     * @ORM\Column(type="datetime", nullable=true)
    */
    private $updatedAt;
}