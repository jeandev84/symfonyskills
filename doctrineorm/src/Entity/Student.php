<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Etudiant
 *
 * @ORM\Entity
 * @ORM\Table(name="student")
*/
class Student
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    */
    private $id;



    /**
     * @ORM\OneToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="mentor_id", referencedColumnName="id")
    */
    private $mentor;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param Student $mentor
     */
    public function setMentor(Student $mentor): void
    {
        $this->mentor = $mentor;
    }


    /**
     * @return Student
     */
    public function getMentor(): Student
    {
        return $this->mentor;
    }

}