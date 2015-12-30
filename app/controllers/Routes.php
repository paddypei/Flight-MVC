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
        $membership = new MembershipController();
        Flight::route('GET /login', array($membership, 'login'));
        Flight::route('POST /login', array($membership, 'loginAttempt'));
        Flight::route('/logout', array($membership, 'logout'));
        Flight::route('/profile/@name', array($membership, 'profile'));
        Flight::route('GET /profile/@name/edit', array($membership, 'profileEdit'));
        Flight::route('POST /profile/@name/edit', array($membership, 'profileEditAttempt'));
        Flight::route('GET /sign-up', array($membership, 'register'));
        Flight::route('POST /sign-up', array($membership, 'registerAttempt'));
        
        // catch everything
        Flight::route('/*', array($pages, 'redirect'));
    }

}
