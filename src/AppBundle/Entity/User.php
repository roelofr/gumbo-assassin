<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * User
 *
 * @author roelofr
 */
class User
{
    /**
     * @var uuid
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Collection
     */
    private $games;

    /**
     * @var Collection
     */
    private $players;

    /**
     * @var Collection
     */
    private $approvals;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->approvals = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add game
     *
     * @param Game $game
     *
     * @return User
     */
    public function addGame(Game $game)
    {
        $this->games[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param Game $game
     */
    public function removeGame(Game $game)
    {
        $this->games->removeElement($game);
    }

    /**
     * Get games
     *
     * @return Collection
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Add player
     *
     * @param Player $player
     *
     * @return User
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
     * Add approval
     *
     * @param Hit $approval
     *
     * @return User
     */
    public function addApproval(Hit $approval)
    {
        $this->approvals[] = $approval;

        return $this;
    }

    /**
     * Remove approval
     *
     * @param Hit $approval
     */
    public function removeApproval(Hit $approval)
    {
        $this->approvals->removeElement($approval);
    }

    /**
     * Get approvals
     *
     * @return Collection
     */
    public function getApprovals()
    {
        return $this->approvals;
    }
}
