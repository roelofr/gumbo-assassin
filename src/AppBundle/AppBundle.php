<?php

namespace AppBundle;

use Acelaya\Doctrine\Type\PhpEnumType;
use AppBundle\Enum\Approval;
use AppBundle\Enum\Role;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{

    /**
     * Register the enum types that the app might use.
     */
    private static function registerEnumTypes() : void
    {
        // Register ENUM types for Doctrine
        PhpEnumType::registerEnumTypes([
            'approval_enum' => Approval::class,
            'role_enum' => Role::class,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        static $registered = false;

        if (!$registered) {
            $registered = true;
            self::registerEnumTypes();
        }
    }
}
