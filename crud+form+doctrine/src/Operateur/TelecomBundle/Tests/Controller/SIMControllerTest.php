<?php

namespace Operateur\TelecomBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SIMControllerTest extends WebTestCase
{
    public function testAddsim()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addSim');
    }

}
