<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf9e7218f71d5874b5632927df4f72bd7
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '2a3c2110e8e0295330dc3d11a4cbc4cb' => __DIR__ . '/..' . '/php-webdriver/webdriver/lib/Exception/TimeoutException.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Process\\' => 26,
        ),
        'F' => 
        array (
            'Facebook\\WebDriver\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Facebook\\WebDriver\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-webdriver/webdriver/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf9e7218f71d5874b5632927df4f72bd7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf9e7218f71d5874b5632927df4f72bd7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf9e7218f71d5874b5632927df4f72bd7::$classMap;

        }, null, ClassLoader::class);
    }
}
