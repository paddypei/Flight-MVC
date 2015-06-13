<?php namespace controllers;

use Flight; 

class LayoutController {

    public static function singleColumnLayout($page, $title, $array)
    {
        Flight::render('header', array('title' => $title));
        Flight::render($page, $array);
        Flight::render('footer');
        return;
    }
    
}
