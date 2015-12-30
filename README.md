# Flight//MVC
A simple starting point for new web applications to get you up and running with an MVC framework in no time. Built ontop of FlightPHP (http://flightphp.com/), Flight//MVC makes use of the Eloquent ORM and the Blade templating engine (with some help from Windwalker), to allow you to more easily build RESTful web applications, within an MVC archetecture. Flight//MVC comes preload with a basic template (Designed with Twitter Bootstrap) and a User model to get you started.

# Background Info
// Dec 2015

Version 1 of this was created while I attempted to learn about the FlightPHP framework, while learning about MVC archetecture. Likewise, Version 2 is also the result of nothing more then my ability to grown and learn. While learning basics about Laravel, I wanted to get some extra practice in with Blade and Eloquent specifically, so I imported them into FlightPHP and decided to share you with the results. Good or bad.

#How to Use

1) Included is a database.sql file with the Users table that Flight//MVC comes preloaded with.

2) In the index.php file is where I import Eloquent and where you will need to set your Database Connection information. You will probably want to modify this for use in production.

3) In /controllers/BasicController.php is where I set the functions for rendering pages using either Flights default engine, or Blade. When using blade, be sure that the template is named with a .blade.php file extension, nad placed within the views folder. 

4) /controllers/Routes.php is where all the routes for the pages are set. I included a wildcard "catch all" at the bottom of the page to redirect to index.

Note: /models/Membership.php sets a very poor AuthToken on line 14. You will probably want to reprogram that to something more secure before putting this into production.
