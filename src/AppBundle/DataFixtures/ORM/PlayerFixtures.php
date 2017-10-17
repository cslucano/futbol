<?php

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $unifiee = new Player();
        $unifiee->setName('FIEE');
        $unifiee->setTeam($this->getReference('team-uni'));
        $manager->persist($unifiee);


        $unifc = new Player();
        $unifc->setName('FC');
        $unifc->setTeam($this->getReference('team-uni'));
        $manager->persist($unifc);

        $medicina = new Player();
        $medicina->setName('MEDICINA');
        $medicina->setTeam($this->getReference('team-unmsm'));
        $manager->persist($medicina);

        $manager->flush();

        $this->addReference('player-unifiee', $unifiee);
        $this->addReference('player-unifc', $unifc);
        $this->addReference('player-unmsmmedicina', $medicina);
    }

    public function getDependencies()
    {
        return [
            TeamFixtures::class,
        ];
    }
}
