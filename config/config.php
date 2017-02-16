<?php 

Config::set('site_name', 'Aikay');

Config::set('languages', array('en', 'fr'));


//routes.  Route name => method prefix
Config::set('routes', array(
	'default' => '',
	'admin' => 'admin_'
));

Config::set('default_route', 'default') ;
Config::set('default_language', 'en') ;
Config::set('default_controller', 'pages') ;
Config::set('default_action', 'index') ;

//database settings
COnfig::set('host', 'localhost');
COnfig::set('username', 'root');
COnfig::set('password', '');
COnfig::set('db_name', '');