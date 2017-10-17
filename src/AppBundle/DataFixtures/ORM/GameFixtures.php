<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $game = new Game();
        $game->setLocal($this->getReference('team-uni'));
        $game->setVisitor($this->getReference('team-unmsm'));
        $manager->persist($game);

        $manager->flush();

        $this->addReference('game', $game);
    }

    public function getDependencies()
    {
        return [
            TeamFixtures::class,
        ];
    }
}
