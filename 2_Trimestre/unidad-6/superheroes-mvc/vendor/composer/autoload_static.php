<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a6c357e32f1fb70dbdc605dadeb373f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a6c357e32f1fb70dbdc605dadeb373f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a6c357e32f1fb70dbdc605dadeb373f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a6c357e32f1fb70dbdc605dadeb373f::$classMap;

        }, null, ClassLoader::class);
    }
}