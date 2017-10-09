<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Player
 *
 * @author roelofr
 */
class Player
{
    /**
     * @var uuid
     */
    private $id;

    /**
     * @var boolean
     */
    private $alive;

    /**
     * @var role_enum
     */
    private $role;

    /**
     * @var Collection
     */
    private $kills;

    /**
     * @var Collection
     */
    private $deaths;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Player
     */
    private $target;

    /**
     * @var Game
     */
    private $game;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->kills = new ArrayCollection();
        $this->deaths = new ArrayCollection();
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
     * Set alive
     *
     * @param boolean $alive
     *
     * @return Player
     */
    public function setAlive($alive)
    {
        $this->alive = $alive;

        return $this;
    }

    /**
     * Get alive
     *
     * @return boolean
     */
    public function getAlive()
    {
        return $this->alive;
    }

    /**
     * Set role
     *
     * @param role_enum $role
     *
     * @return Player
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return role_enum
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add kill
     *
     * @param Hit $kill
     *
     * @return Player
     */
    public function addKill(Hit $kill)
    {
        $this->kills[] = $kill;

        return $this;
    }

    /**
     * Remove kill
     *
     * @param Hit $kill
     */
    public function removeKill(Hit $kill)
    {
        $this->kills->removeElement($kill);
    }

    /**
     * Get kills
     *
     * @return Collection
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * Add death
     *
     * @param Hit $death
     *
     * @return Player
     */
    public function addDeath(Hit $death)
    {
        $this->deaths[] = $death;

        return $this;
    }

    /**
     * Remove death
     *
     * @param Hit $death
     */
    public function removeDeath(Hit $death)
    {
        $this->deaths->removeElement($death);
    }

    /**
     * Get deaths
     *
     * @return Collection
     */
    public function getDeaths()
    {
        return $this->deaths;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Player
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set target
     *
     * @param Player $target
     *
     * @return Player
     */
    public function setTarget(Player $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return Player
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set game
     *
     * @param Game $game
     *
     * @return Player
     */
    public function setGame(Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
