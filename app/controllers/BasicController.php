<?php namespace controllers;

use Flight; 
use Windwalker\Renderer\BladeRenderer;

class BasicController {

    public static function flight($page, $array = null)
    {
        Flight::render($page, $array);
        return;
    }

    public static function blade($page, $array = null)
    {
        $paths = __DIR__ . '\\..\\views';
        $renderer = new BladeRenderer($paths, array('cache_path' => __DIR__ . '/../views/cache'));
        echo $renderer->render($page, $array);
        return;
    }
    
}
