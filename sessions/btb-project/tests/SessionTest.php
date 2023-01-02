<?php

class SessionTest extends \PHPUnit\Framework\TestCase
{
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
}