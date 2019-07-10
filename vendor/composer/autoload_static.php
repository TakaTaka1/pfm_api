<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit508df735944bff636d1238a41b00e62d
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'D' => 
        array (
            'DB\\' => 3,
        ),
        'A' => 
        array (
            'Api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api/Models',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'DB\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api/DB',
        ),
        'Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'About' => __DIR__ . '/../..' . '/api/about/about.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit508df735944bff636d1238a41b00e62d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit508df735944bff636d1238a41b00e62d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit508df735944bff636d1238a41b00e62d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit508df735944bff636d1238a41b00e62d::$classMap;

        }, null, ClassLoader::class);
    }
}
