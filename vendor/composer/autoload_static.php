<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2dc61ca70f617d57100399769c78e156
{
    public static $prefixLengthsPsr4 = array (
        'x' => 
        array (
            'xenframe\\RouterLibrary\\' => 23,
            'xenframe\\MvcLibrary\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'xenframe\\RouterLibrary\\' => 
        array (
            0 => __DIR__ . '/..' . '/xenframe/router-library/src',
        ),
        'xenframe\\MvcLibrary\\' => 
        array (
            0 => __DIR__ . '/..' . '/xenframe/mvc-library/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2dc61ca70f617d57100399769c78e156::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2dc61ca70f617d57100399769c78e156::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2dc61ca70f617d57100399769c78e156::$classMap;

        }, null, ClassLoader::class);
    }
}
