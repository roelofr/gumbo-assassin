<?php

namespace AppBundle\Repository;

/**
 * Handles frequently-performed queries to find players based on games and
 * users.
 *
 * @author roelofr
 */
class PlayerRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find all players for a given game. The Player objects will have their
     * associated users hydrated as well.
     *
     * @param  Game         $game
     * @param  int|null     $limit
     * @param  int|null     $offset
     * @return array
     */
    public function findByGame(
        Game $game,
        $limit = null,
        $offset = null
    ) : array {
        return $this->createNamedQuery('deep-game')
            ->setParameters(['game' => $game])
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getResult();
    }

    /**
     * Find all players for a given game with the given role. The Player
     * objects will have their associated users hydrated as well.
     *
     * @param  Game         $game
     * @param  Role         $role
     * @param  int|null     $limit
     * @param  int|null     $offset
     * @return array
     */
    public function findByGameRole(
        Game $game,
        Role $role,
        $limit = null,
        $offset = null
    ) : array {
        return $this->createNamedQuery('deep-game-role')
            ->setParameters([
                'game' => $game,
                'role' => $role
            ])
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getResult();
    }

    /**
     * Find all players for a given user, the Game property will be supplied
     * with data.
     *
     * @param  User         $user
     * @param  int|null     $limit
     * @param  int|null     $offset
     * @return array
     */
    public function findByUser(
        User $user,
        int $limit = null,
        int $offset = null
    ) : array {
        return $this->createNamedQuery('deep-user')
            ->setParameters(['user' => $user])
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getResult();
    }

    /**
     * Returns a single player for the game-user combination. May return null!
     *
     * @param  User   $user
     * @param  Game   $game
     * @return Player
     */
    public function findPlayer(User $user, Game $game) : ?Player
    {
        return $this->findOneBy([
            'user' => $user,
            'game' => $game
        ]);
    }
}
