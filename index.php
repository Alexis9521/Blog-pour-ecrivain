<?php

spl_autoload_register(function ($class)
{
    $files = array('controller/' . $class . '.php', 'model/' . $class . '.php');
    foreach ($files as $file)
    {
        if (file_exists($file))
        {
            require_once $file;
        }
    }
});

$frontendController = new FrontendController();

if(isset($_GET['action']))
{

	if(isset($_GET['action']))
		if($_GET['action'] == 'home')
			$frontendController->home();
		elseif($_GET['action'] == 'article')
			$frontendController->article();
		elseif($_GET['action'] == 'contact')
			$frontendController->contact();
		elseif($_GET['action'] == 'login')
			$frontendController->login();
		elseif($_GET['action'] == 'inscription')
			$frontendController->inscription();
	
}
else
	$frontendController->home();
