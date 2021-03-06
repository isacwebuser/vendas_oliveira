<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9793f7abdba0593aa2e337d2e957f4df
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9793f7abdba0593aa2e337d2e957f4df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9793f7abdba0593aa2e337d2e957f4df::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9793f7abdba0593aa2e337d2e957f4df::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
