<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit453a55ed2b1b577af0d9da5f06741273
{
    public static $classMap = array (
        'TesseractOCR' => __DIR__ . '/..' . '/thiagoalessio/tesseract_ocr/src/TesseractOCR.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit453a55ed2b1b577af0d9da5f06741273::$classMap;

        }, null, ClassLoader::class);
    }
}
