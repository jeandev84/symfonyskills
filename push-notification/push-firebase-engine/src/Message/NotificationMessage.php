<?php
namespace App\Message;

class NotificationMessage
{

     const TOKEN_CLIENT = "dLASAUjq-_xGJWyelUT8zh:APA91bE8-W2fKd0UHWT72Z3g9hbT__F6N9lLkAWeq4rjButMKYtKSoXxs-AK9_qm3uyJ7YM8fL2ywoEfb1LaJy6kvDVbA3OO-zCtw6tfMk1rURrEJqw4va3bLNlkGA1P_OAaarayH3XM";


     protected ?string $tokenClient;


     public function __construct(protected string $content)
     {
          $this->tokenClient = self::TOKEN_CLIENT;
     }


     /**
      * @param string $content
     */
     public function setContent(string $content): void
     {
          $this->content = $content;
     }


     /**
      * @return string
     */
     public function getContent(): string
     {
         return $this->content;
     }



    /**
      * @param string|null $tokenClient
     */
     public function setTokenClient(?string $tokenClient): void
     {
          $this->tokenClient = $tokenClient;
     }



     /**
      * @return string
     */
     public function getTokenClient(): string
     {
         return $this->tokenClient;
     }
}