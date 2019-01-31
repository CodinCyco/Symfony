<?php

namespace Operateur\TelecomBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AbonnesControllerTest extends WebTestCase
{
    public function testGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/get');
    }

    public function testGetall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getAll');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add');
    }

}
