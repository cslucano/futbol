<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goal
 *
 * @ORM\Table(name="goal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GoalRepository")
 */
class Goal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Game")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;

    /**
     * @ORM\OneToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;

    /**
     * @ORM\OneToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="scorer_id", referencedColumnName="id")
     */
    private $scorer;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param Game $game
     * @return Goal
     */
    public function setGame($game)
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     * @return Goal
     */
    public function setTeam($team)
    {
        $this->team = $team;
        return $this;
    }



    /**
     * @return Player
     */
    public function getScorer()
    {
        return $this->scorer;
    }

    /**
     * @param Player $scorer
     * @return Goal
     */
    public function setScorer($scorer)
    {
        $this->scorer = $scorer;
        return $this;
    }

}
