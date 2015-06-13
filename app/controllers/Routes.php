<?php namespace controllers;

use Flight;

class Routes {
    
    public function __construct()
    {
        // Optional Parameters = /(index.php) means you can either use / OR /index.php 
        // Named Parameters = @name will pass $name into your callback function
        // Wildcard = *
        
        Flight::set('flight.views.path', 'app/views/');
        
        // Pages Controller
        $pages = new PagesController();
        Flight::route('/(index)', array($pages, 'index'));
        Flight::route('/about', array($pages, 'about'));
        Flight::route('/contact', array($pages, 'contact'));
        
        // Membership Controller
        
    }

}
