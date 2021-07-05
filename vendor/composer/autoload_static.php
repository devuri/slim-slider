<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2cf1bd838b3c4ee620cc95822a13a3f8
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPAdminPage\\' => 12,
        ),
        'S' => 
        array (
            'SlimSlider\\' => 11,
        ),
        'D' => 
        array (
            'DevUri\\Meta\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPAdminPage\\' => 
        array (
            0 => __DIR__ . '/..' . '/devuri/wp-admin-page/src',
        ),
        'SlimSlider\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'DevUri\\Meta\\' => 
        array (
            0 => __DIR__ . '/..' . '/devuri/cpt-meta-box/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DevUri\\Meta\\Contracts\\SettingsInterface' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Contracts/SettingsInterface.php',
        'DevUri\\Meta\\Data' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Data.php',
        'DevUri\\Meta\\Editor' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Editor.php',
        'DevUri\\Meta\\MetaBox' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/MetaBox.php',
        'DevUri\\Meta\\Settings' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Settings.php',
        'DevUri\\Meta\\Traits\\Form' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Traits/Form.php',
        'DevUri\\Meta\\Traits\\MetaTrait' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Traits/MetaTrait.php',
        'DevUri\\Meta\\Traits\\StyleTrait' => __DIR__ . '/..' . '/devuri/cpt-meta-box/src/Traits/StyleTrait.php',
        'SlimSlider\\Admin\\GetStarted' => __DIR__ . '/../..' . '/src/Admin/GetStarted.php',
        'SlimSlider\\Asset' => __DIR__ . '/../..' . '/src/Asset.php',
        'SlimSlider\\EasyAdmin\\Admin' => __DIR__ . '/../..' . '/src/EasyAdmin/Admin.php',
        'SlimSlider\\EasyAdmin\\AdminPage' => __DIR__ . '/../..' . '/src/EasyAdmin/AdminPage.php',
        'SlimSlider\\EasyAdmin\\ParamTrait' => __DIR__ . '/../..' . '/src/EasyAdmin/ParamTrait.php',
        'SlimSlider\\EasyAdmin\\StylesTrait' => __DIR__ . '/../..' . '/src/EasyAdmin/StylesTrait.php',
        'SlimSlider\\MetaView\\Slide' => __DIR__ . '/../..' . '/src/MetaView/Slide.php',
        'SlimSlider\\Navigation' => __DIR__ . '/../..' . '/src/Navigation.php',
        'SlimSlider\\Plugin' => __DIR__ . '/../..' . '/src/Plugin.php',
        'SlimSlider\\Slides' => __DIR__ . '/../..' . '/src/Slides.php',
        'SlimSlider\\SlimSlide' => __DIR__ . '/../..' . '/src/SlimSlide.php',
        'WPAdminPage\\AdminPage' => __DIR__ . '/..' . '/devuri/wp-admin-page/src/AdminPage.php',
        'WPAdminPage\\FormHelper' => __DIR__ . '/..' . '/devuri/wp-admin-page/src/FormHelper.php',
        'WPAdminPage\\Form\\Editor' => __DIR__ . '/..' . '/devuri/wp-admin-page/src/Form/Editor.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2cf1bd838b3c4ee620cc95822a13a3f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2cf1bd838b3c4ee620cc95822a13a3f8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2cf1bd838b3c4ee620cc95822a13a3f8::$classMap;

        }, null, ClassLoader::class);
    }
}
