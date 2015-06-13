<?php namespace controllers;

use Flight; 

class PagesController extends LayoutController {

    public static function index()
    {
        $array = array('name' => 'Guest');
        parent::singleColumnLayout('hello', 'Index', $array);
        return;
    }
    
    public static function about()
    {   
        $array = array();
        parent::singleColumnLayout('about', 'About Us', $array);
        return;
    }
    
    public static function contact()
    {
        $array = array();
        parent::singleColumnLayout('contact', 'Contact Us', $array);
        return;
    }
    
}
