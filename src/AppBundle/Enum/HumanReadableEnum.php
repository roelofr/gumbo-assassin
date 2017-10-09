<?php
declare(strict_types=1);

namespace AppBundle\Enum;

use MyCLabs\Enum\Enum;

/**
 * Adds a method to get the human-readable name
 *
 * @author roelofr
 */
abstract class HumanReadableEnum extends Enum implements \JsonSerializable
{
    /**
     * Contains human-readable values
     *
     * These are used when generating a human-friendly output. They map a
     * key name to a human-readable value which makes it easier to see which is
     * which (and customers don't need to worry about illegible texts).
     *
     * @var array
     */
    protected static $humanReadableValues;

    /**
     * Builds an array that can be passed to Symfony's ChoiceType form type.
     *
     * @return array Array with human-readable value as key, enum value as value.
     */
    public static function toFormArray() : array
    {
        $opts = [];
        foreach (static::values() as $val) {
            $opts[$val->getHumanReadable()] = $val->getValue();
        }
        return $opts;
    }

    /**
     * Returns a human-readable value of this enum.
     *
     * @return string
     */
    public function getHumanReadable() : ?string
    {
        $value = $this->getValue();

        if ($value === null) {
            return null;
        }

        if (is_array(static::$humanReadableValues) && array_key_exists($value, static::$humanReadableValues)) {
            return static::$humanReadableValues[$value];
        }

        return ucfirst(strtolower($this->getKey()));
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return $this->getHumanReadable();
    }
}
