<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Goal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GoalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $goal = new Goal();
        $goal->setGame($this->getReference('game'));
        $goal->setTeam($this->getReference('team-uni'));
        $goal->setScorer($this->getReference('player-unifiee'));
        $manager->persist($goal);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GameFixtures::class,
        ];
    }
}
