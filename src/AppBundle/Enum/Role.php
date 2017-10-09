<?php
declare(strict_types=1);

namespace AppBundle\Enum;

/**
 * Describes if
 * @var [type]
 */
final class Role extends HumanReadableEnum
{
    const UNASSIGNED = 'u';
    const PLAYER = 'p';
    const REFEREE = 'r';

    /**
     * @{inheritdoc}
     */
    protected static $humanReadableValues = [
        self::UNASSIGNED => 'Unassigned',
        self::PLAYER => 'Player',
        self::REFEREE => 'Referee'
    ];
}
