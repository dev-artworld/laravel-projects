<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit685684a525c5d0ac794ad40245b8db9f
{
    public static $files = array (
        '3b5531f8bb4716e1b6014ad7e734f545' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/helpers.php',
        'e40631d46120a9c38ea139981f8dab26' => __DIR__ . '/..' . '/ircmaxell/password-compat/lib/password.php',
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
        1 => __DIR__ . '/../..' . '/app/controllers',
        2 => __DIR__ . '/../..' . '/app/models',
        3 => __DIR__ . '/../..' . '/app/middlewares',
        4 => __DIR__ . '/../..' . '/app/modules',
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_Extensions_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/extensions/lib',
            ),
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'S' => 
        array (
            'Symfony\\Component\\Translation\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/translation',
            ),
            'Slim\\Views' => 
            array (
                0 => __DIR__ . '/..' . '/slim/views',
            ),
            'SlimFacades' => 
            array (
                0 => __DIR__ . '/..' . '/itsgoingd/slim-facades',
            ),
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'I' => 
        array (
            'Illuminate\\Support' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/support',
            ),
            'Illuminate\\Events' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/events',
            ),
            'Illuminate\\Database' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/database',
            ),
            'Illuminate\\Container' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/container',
            ),
        ),
        'C' => 
        array (
            'Cartalyst\\Sentry' => 
            array (
                0 => __DIR__ . '/..' . '/cartalyst/sentry/src',
            ),
            'Carbon' => 
            array (
                0 => __DIR__ . '/..' . '/nesbot/carbon/src',
            ),
        ),
    );

    public static $classMap = array (
        'Cartalyst\\Sentry\\Groups\\GroupExistsException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
        'Cartalyst\\Sentry\\Groups\\GroupNotFoundException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
        'Cartalyst\\Sentry\\Groups\\NameRequiredException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
        'Cartalyst\\Sentry\\Throttling\\UserBannedException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
        'Cartalyst\\Sentry\\Throttling\\UserSuspendedException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\LoginRequiredException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\PasswordRequiredException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\UserAlreadyActivatedException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\UserExistsException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\UserNotActivatedException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\UserNotFoundException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'Cartalyst\\Sentry\\Users\\WrongPasswordException' => __DIR__ . '/..' . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
        'MigrationCartalystSentryInstallGroups' => __DIR__ . '/..' . '/cartalyst/sentry/src/migrations/2012_12_06_225929_migration_cartalyst_sentry_install_groups.php',
        'MigrationCartalystSentryInstallThrottle' => __DIR__ . '/..' . '/cartalyst/sentry/src/migrations/2012_12_06_225988_migration_cartalyst_sentry_install_throttle.php',
        'MigrationCartalystSentryInstallUsers' => __DIR__ . '/..' . '/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php',
        'MigrationCartalystSentryInstallUsersGroupsPivot' => __DIR__ . '/..' . '/cartalyst/sentry/src/migrations/2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit685684a525c5d0ac794ad40245b8db9f::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit685684a525c5d0ac794ad40245b8db9f::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit685684a525c5d0ac794ad40245b8db9f::$classMap;

        }, null, ClassLoader::class);
    }
}