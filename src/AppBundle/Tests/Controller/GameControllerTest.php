<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list');
    }

    public function testJoin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/join');
    }

    public function testLeave()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/leave');
    }

    public function testCurrent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/current');
    }
}
