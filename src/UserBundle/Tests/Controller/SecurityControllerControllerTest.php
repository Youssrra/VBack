<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerControllerTest extends WebTestCase
{
    public function testRedirect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/redirectAction');
    }

}
