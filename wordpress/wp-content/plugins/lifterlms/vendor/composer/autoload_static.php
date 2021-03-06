<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7af1d11561ac7e7a939bc04278f80d33
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LLMS\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LLMS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7af1d11561ac7e7a939bc04278f80d33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7af1d11561ac7e7a939bc04278f80d33::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7af1d11561ac7e7a939bc04278f80d33::$classMap;

        }, null, ClassLoader::class);
    }
}
