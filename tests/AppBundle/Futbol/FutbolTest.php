<?php

namespace Tests\AppBundle\Futbol;

use AppBundle\Entity\Team;
use AppBundle\Futbol\Futbol;
use Doctrine\ORM\EntityManager;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class FutbolTest extends WebTestCase
{
    private $container;

    public function setUp()
    {
        self::bootKernel();

        $this->container = self::$kernel->getContainer();
    }

    public function testGameScore()
    {
        $this->loadFixtures([
            'AppBundle\DataFixtures\ORM\TeamFixtures',
            'AppBundle\DataFixtures\ORM\PlayerFixtures',
            'AppBundle\DataFixtures\ORM\GameFixtures',
            'AppBundle\DataFixtures\ORM\GoalFixtures',
        ]);

        /** @var EntityManager $doctrine */
        $doctrine = $this->container->get('doctrine');

        /** @var Game $game */
        $game = $doctrine->getRepository('AppBundle:Game')->findOneByName('G1');

        /** @var Futbol $futbol */
        $futbol = $this->container->get(Futbol::class);

        $this->assertEquals('UNI 1 UNMSM 0', $futbol->gameScore($game));
    }
    
    public function testGetIntoPlayer()
    {
        $this->loadFixtures([
            'AppBundle\DataFixtures\ORM\TeamFixtures',
            'AppBundle\DataFixtures\ORM\PlayerFixtures',
        ]);

        /** @var EntityManager $doctrine */
        $doctrine = $this->container->get('doctrine');
            
        /** @var Team $team */
        $team = $doctrine->getRepository('AppBundle:Team')->findOneByName('UNMSM');

        /** @var Futbol $futbol */
        $futbol = $this->container->get(Futbol::class);
        
        $futbol->getIntoPlayer($team, 'FISI');

        $this->assertEquals("Team: UNMSM\n MEDICINA\n FISI\n", $futbol->getPlayers($team));

    }
}
