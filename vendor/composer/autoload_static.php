<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7441d889de9ad22578d9306901b68be7
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7441d889de9ad22578d9306901b68be7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7441d889de9ad22578d9306901b68be7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
