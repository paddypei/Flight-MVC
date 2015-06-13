# Flight-MVC
A simple starting point for new PHP web application built ontop of Flight (http://flightphp.com/).

# Background Info
So I'm doing my best on my own to move from the proceedural world of PHP to the object-oriented landscape. 

While I already understood at least what Objects and Classes were, I haven't been using in the best possible way. As well I needed to learn about the benefits of an autoloader and Composer. Namespacing and the like.

After absorbing what I could about SOLID principles, and at least the basic concept of Model-View-Controller, I decided I needed to put these to work right away if I stood any chance of retaining the information, and gaining a better understanding.  

I understand I still need to learn one of the big Frameworks ontop of all of this ( which is the next step ), but for now I choose to go with Flight-PHP to get things started. 

# About Flight//MVC

I setup Flight using Composer, with autoload set to psr-0. I then setup the directory structure. Setup my routs, and built some fairly simple Controllers to deal with handing Views for 3 basic pages. 

The pages available are index, contact, about. They don't do anything, and are more just place holders.

/app/controllers/LayoutController.php
  This class contains one method, singleColumnLayout, which is used for handeling the template I use. The header, the body, and the footer.
  I intend to add additional methods as needed, such as doubleColumnLayout to handle pages that have a side navigation for example.
  
/app/controllers/PagesController.php extends LayoutController.php
  This class contains methods for handing 3 pages: index, about, contact
  (Where required) it builds an array of nessessary information needed for the view, then makes a call to parent:singleColumLayout passing in the needed page, the page title, and the array.
  
/app/controllers/Routes.php is instantinated from the index.php page
  This class defines the location of the views directory.
  It also will server as a list of all pages, pointing to whatever controller is needed to display them.

/app/views
  This directory contains the various template files needed. header.php, footer.php for the generic template. Then hello, about, contact for the body templates.
  
/vendor
  This directory contains our autoloader, and the Flight PHP framework.

/.htaccess
  This file is all of 4 lines long, and just simply setups the mod_rewrite rules needed for the Routes to work.
  
/index.php
  Our main file, simply calls the autoloader, instainaiates Routes, and starts the Flight framework.
  
What were left with isn't a completed app, the model in "MVC" is clearly still missing here. This dosn't do anything. It's simply a starting place for future apps to save me (and hopefully you) a little bit of setup time.

  
