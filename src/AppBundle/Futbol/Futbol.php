<?php

namespace AppBundle\Futbol;

use AppBundle\Entity\Game;
use AppBundle\Entity\Goal;
use AppBundle\Entity\Player;
use AppBundle\Entity\Team;
use Doctrine\Common\Persistence\ObjectManager;

class Futbol
{
    /**
     * @var ObjectManager $manager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function createGame(Team $local, Team $visitor) 
    {
        if (!$local or !$visitor or $local->getId() == $visitor->getId()) {
            throw new \Exception("Teams must be registered and be different");
        }

        $game = new Game();
        $game->setLocal($local);
        $game->setVisitor($visitor);
        $this->manager->persist($game);
        $this->manager->flush();

        return $game;
    }
    
    public function gameScore(Game $game)
    {
        $localName = $game->getLocal()->getName();
        $visitorName = $game->getVisitor()->getName();
        $goals = $game->getGoals();
        
        $localgoals = 0;
        $visitorgoals = 0;
        /** @var Goal $goal */
        foreach ($goals as $goal) {
            if( $goal->getTeam()->getId() == $game->getLocal()->getId() ) {
                $localgoals++;
            } else {
                $visitorgoals++;
            }
            
        }
        return sprintf('%s %s %s %s', $localName, $localgoals, $visitorName, $visitorgoals);
    }

    public function getPlayers(Team $team) {
        $players = sprintf("Team: %s\n", $team->getName());
        /** @var Player $player */
        foreach ($team->getPlayers() as $player) {
            $players .= sprintf(" %s\n", $player->getName());
        }

        return $players;
    }

    public function getIntoPlayer(Team $team, $playerName) {
        $player = new Player();
        $player->setName($playerName);
        $player->setTeam($team);

        $this->manager->persist($player);
        $this->manager->flush();
    }
}
