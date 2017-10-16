<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\OneToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="local_id", referencedColumnName="id")
     */
    private $local;

    /**
     * @ORM\OneToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="visitor_id", referencedColumnName="id")
     */
    private $visitor;

    /**
     * @ORM\OneToMany(targetEntity="Goal", mappedBy="game")
     */
    private $goals;

    public function __construct()
    {
        $this->goals = new ArrayCollection();
    }


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
     * @return Team
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param Team $local
     * @return Game
     */
    public function setLocal($local)
    {
        $this->local = $local;
        return $this;
    }

    /**
     * @return Team
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @param Team $visitor
     * @return Game
     */
    public function setVisitor($visitor)
    {
        $this->visitor = $visitor;
        return $this;
    }
}
