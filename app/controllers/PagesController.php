<?php namespace controllers;

use Flight; 
use models\Membership as Membership;

class PagesController extends BasicController {

    public static function index()
    {
        echo (new Membership)->login;
        parent::blade('index');
        return;
    }
    
    public static function about()
    {   
        $array = array();
        parent::blade('about', $array);
        return;
    }
    
    public static function contact()
    {
        $array = array();
        parent::blade('contact', $array);
        return;
    }
    
    public static function redirect()
    {
        return Flight::redirect('index');
    }
}
