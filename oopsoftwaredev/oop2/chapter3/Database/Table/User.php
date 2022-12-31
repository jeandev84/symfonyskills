<?php
require_once __DIR__.'/../../Database/DataModel.php';


class User extends DataModel
{

    private int $id;
    private string $username;
    private string $surname;
    private string $name;
    private ?string $patronymic;
    protected string $tableName = 'users';




    /**
     * @return int|null
    */
    public function getId(): ?int
    {
        return $this->id;
    }





    /**
     * @param string|null $username
    */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }




    /**
     * @return string|null
    */
    public function getUsername(): ?string
    {
        return $this->username;
    }




    /**
     * @param string|null $name
    */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }




    /**
     * @return string
    */
    public function getName(): string
    {
        return $this->name;
    }




    /**
     * @param string|null $patronymic
    */
    public function setPatronymic(?string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }



    /**
     * @return string|null
    */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }




    public function getFullName()
    {
         require "Ф.И.О";
    }
}