<?php

class SessionTest extends \PHPUnit\Framework\TestCase
{


    protected function setUp(): void
    {
         if (session_status() === PHP_SESSION_ACTIVE) {
              session_destroy();
         }
    }



    /** @test */
    public function can_check_if_a_session_is_started()
    {
         /* $this->assertTrue(true); */

         // SETUP
         // Create a session object
         $session = new \App\Session\Session();


         // Assert session is not started
         $this->assertFalse($session->isStarted());
    }



    /** @test */
    public function a_session_can_be_started()
    {
        // SETUP
        // Create a session object
        $session = new \App\Session\Session();

        //DO SOMETHING
        $sessionStatus = $session->start();


        // MAKE ASSERTIONS
        // Assert session is started
        $this->assertTrue($session->isStarted());
        $this->assertTrue($sessionStatus);
    }
}