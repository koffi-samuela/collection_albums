<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf73be77548a6f2b6d5b2dfb803837034
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf73be77548a6f2b6d5b2dfb803837034', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf73be77548a6f2b6d5b2dfb803837034', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf73be77548a6f2b6d5b2dfb803837034::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
