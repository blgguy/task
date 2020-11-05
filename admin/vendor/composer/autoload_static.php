<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit957228327b29a0041cd366da09bf145b
{
    public static $files = array (
        '6195ccae414b7a82ab47247beb894d66' => __DIR__ . '/..' . '/nezamy/route/system/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\Support\\' => 15,
            'System\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/nezamy/support',
        ),
        'System\\' => 
        array (
            0 => __DIR__ . '/..' . '/nezamy/route/system',
        ),
    );

    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JasonGrimes' => 
            array (
                0 => __DIR__ . '/..' . '/jasongrimes/paginator/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit957228327b29a0041cd366da09bf145b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit957228327b29a0041cd366da09bf145b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit957228327b29a0041cd366da09bf145b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
