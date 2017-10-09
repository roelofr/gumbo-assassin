<?php
declare(strict_types=1);

namespace AppBundle\Enum;

/**
 * Describes if
 * @var [type]
 */
final class Approval extends HumanReadableEnum
{
    const UNKNOWN = 'u';
    const APPROVED = 'a';
    const REJECTED = 'd';

    /**
     * @{inheritdoc}
     */
    protected static $humanReadableValues = [
        self::UNKNOWN => 'Unknown',
        self::APPROVED => 'Approved',
        self::REJECTED => 'Rejected'
    ];
}
