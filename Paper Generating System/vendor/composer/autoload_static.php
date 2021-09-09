<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58e0c2693a91bbaa69afd9909b5a68d8
{
    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit58e0c2693a91bbaa69afd9909b5a68d8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit58e0c2693a91bbaa69afd9909b5a68d8::$classMap;

        }, null, ClassLoader::class);
    }
}
