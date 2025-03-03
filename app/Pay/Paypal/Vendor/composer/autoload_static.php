<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf0725165ad7f2e63f6d9276c58efef24
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf0725165ad7f2e63f6d9276c58efef24::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf0725165ad7f2e63f6d9276c58efef24::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf0725165ad7f2e63f6d9276c58efef24::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf0725165ad7f2e63f6d9276c58efef24::$classMap;

        }, null, ClassLoader::class);
    }
}
