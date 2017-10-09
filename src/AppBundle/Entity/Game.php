<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * A game, organised by a host (a User) and containing one or more players.
 *
 * @author roelofr
 */
class Game
{
    /**
     * @var uuid
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var Collection
     */
    private $hits;

    /**
     * @var Collection
     */
    private $players;

    /**
     * @var User
     */
    private $host;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hits = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Game
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Game
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Add hit
     *
     * @param Hit $hit
     *
     * @return Game
     */
    public function addHit(Hit $hit)
    {
        $this->hits[] = $hit;

        return $this;
    }

    /**
     * Remove hit
     *
     * @param Hit $hit
     */
    public function removeHit(Hit $hit)
    {
        $this->hits->removeElement($hit);
    }

    /**
     * Get hits
     *
     * @return Collection
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Add player
     *
     * @param Player $player
     *
     * @return Game
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set host
     *
     * @param User $host
     *
     * @return Game
     */
    public function setHost(User $host = null)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return User
     */
    public function getHost()
    {
        return $this->host;
    }
}
