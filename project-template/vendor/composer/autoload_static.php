<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37b3fbd7b56e57705d3905fd7fee3dc4
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\MimeTypeDetection\\' => 25,
            'League\\Flysystem\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\MimeTypeDetection\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/mime-type-detection/src',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit37b3fbd7b56e57705d3905fd7fee3dc4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37b3fbd7b56e57705d3905fd7fee3dc4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit37b3fbd7b56e57705d3905fd7fee3dc4::$classMap;

        }, null, ClassLoader::class);
    }
}
