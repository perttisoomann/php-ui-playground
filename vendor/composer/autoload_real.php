<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3ed03efc6706d3a4a6b8205bb015efec
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

        spl_autoload_register(array('ComposerAutoloaderInit3ed03efc6706d3a4a6b8205bb015efec', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3ed03efc6706d3a4a6b8205bb015efec', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3ed03efc6706d3a4a6b8205bb015efec::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
