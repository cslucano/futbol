<?php

namespace Tests\AppBundle\Futbol;

use AppBundle\Futbol\Futbol;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FutbolTest extends KernelTestCase
{
    private $container;

    public function setUp()
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
    }

    public function testGameScore()
    {
        /** @var Game $game */
        $game = $this->container->get('doctrine')->getRepository('AppBundle:Game')->find(1);

        /** @var Futbol $futbol */
        $futbol = $this->container->get(Futbol::class);
        
        $this->assertEquals('UNI 1 UNMSM 0', $futbol->gameScore($game));
    }
}
