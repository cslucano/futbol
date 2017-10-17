<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $teamUni = new Team();
        $teamUni->setName('UNI');
        $manager->persist($teamUni);

        $teamUnmsm = new Team();
        $teamUnmsm->setName('UNMSM');
        $manager->persist($teamUnmsm);
        
        $manager->flush();

        $this->addReference('team-uni', $teamUni);
        $this->addReference('team-unmsm', $teamUnmsm);
    }
}
