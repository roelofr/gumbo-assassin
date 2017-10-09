<?php

namespace AppBundle\Entity;

/**
 * A hit, which is when a Player marked another player as 'tagged'.
 *
 * @author roelofr
 */
class Hit
{
    /**
     * @var uuid
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var array
     */
    private $location;

    /**
     * @var approval_enum
     */
    private $approved;

    /**
     * @var Player
     */
    private $assassin;

    /**
     * @var Player
     */
    private $victim;

    /**
     * @var User
     */
    private $approvedBy;

    /**
     * @var Game
     */
    private $game;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Hit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set location
     *
     * @param array $location
     *
     * @return Hit
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return array
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set approved
     *
     * @param approval_enum $approved
     *
     * @return Hit
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return approval_enum
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set assassin
     *
     * @param Player $assassin
     *
     * @return Hit
     */
    public function setAssassin(Player $assassin = null)
    {
        $this->assassin = $assassin;

        return $this;
    }

    /**
     * Get assassin
     *
     * @return Player
     */
    public function getAssassin()
    {
        return $this->assassin;
    }

    /**
     * Set victim
     *
     * @param Player $victim
     *
     * @return Hit
     */
    public function setVictim(Player $victim = null)
    {
        $this->victim = $victim;

        return $this;
    }

    /**
     * Get victim
     *
     * @return Player
     */
    public function getVictim()
    {
        return $this->victim;
    }

    /**
     * Set approvedBy
     *
     * @param User $approvedBy
     *
     * @return Hit
     */
    public function setApprovedBy(User $approvedBy = null)
    {
        $this->approvedBy = $approvedBy;

        return $this;
    }

    /**
     * Get approvedBy
     *
     * @return User
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * Set game
     *
     * @param Game $game
     *
     * @return Hit
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
