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


    /** @test */
    public function items_can_be_added_to_the_session()
    {
          // SETUP
          $productId1 = 1;
          $productId2 = 2;


          $session = new App\Session\Session();
          $session->start();


          // DO SOMETHING
          $session->set('cart.items', [
              $productId1 => ['quantity' => 1, 'price' => 1099],
              $productId2 => ['quantity' => 2, 'price' => 599],
          ]);


          // MAKE ASSERTIONS
          // $o = [1, 2, 3];
          // $p = [1, 2];

          // dd(array_diff($o, $p));
          // dd(! array_diff($o, $p));
          // dd(! array_diff([$productId1, $productId2], array_keys($_SESSION['cart.items'])));
          // $this->assertArrayHasKey($productId1, $_SESSION['cart.items']);

          $this->assertArrayHasKeys($_SESSION['cart.items'], [$productId1, $productId2]);
    }


    
    /** @test */
    public function can_check_that_an_items_exists_in_a_session()
    {
         // SETUP
        $session = new App\Session\Session();
        $session->start();


        // DO SOMETHING
        $session->set('auth.id', 1);


        // MAKE ASSERTIONS
        $this->assertTrue($session->has('auth.id'));
        $this->assertFalse($session->has('false.key'));
    }




    /** @test */
    public function can_retrieve_an_item_from_the_session()
    {
        // SETUP
        $session = new App\Session\Session();
        $session->start();
        $session->set('auth.id', 678);

        // DO SOMETHING
        $authId    = $session->get('auth.id');
        $falseItem = $session->get('false.item');
        $retrievedDefault = $session->get('false.item', 'retrieved default');


        // MAKE ASSERTIONS
        $this->assertEquals(678, $authId);
        $this->assertNull($falseItem);
        $this->assertEquals('retrieved default', $retrievedDefault);
    }





    public function assertArrayHasKeys(array $array, array $keys)
    {
        $diff = array_diff($keys, array_keys($array));

        $this->assertTrue(!$diff, 'The array does not contain the following key(s): '. implode(', ', $diff));
    }
}