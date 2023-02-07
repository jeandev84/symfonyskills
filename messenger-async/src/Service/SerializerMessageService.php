<?php
namespace App\Service;

class SerializerMessageService
{
    public function deserializedMessage()
    {
        //  dd($this->deserializedMessage());
        // from table "messenger_messages
        return unserialize("O:36:\"Symfony\\Component\\Messenger\\Envelope\":2:{s:44:\"\0Symfony\\Component\\Messenger\\Envelope\0stamps\";a:1:{s:46:\"Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\";a:1:{i:0;O:46:\"Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\":1:{s:55:\"\0Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\0busName\";s:21:\"messenger.bus.default\";}}}s:45:\"\0Symfony\\Component\\Messenger\\Envelope\0message\";O:35:\"App\\Message\\UserNotificationMessage\":1:{s:9:\"\0*\0userId\";i:1;}} ");
    }
}