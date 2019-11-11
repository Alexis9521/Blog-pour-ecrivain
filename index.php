<?php

session_start();


spl_autoload_register(function ($class)
{
    $files = array('Controller/' . $class . '.php', 'Model/' . $class . '.php');
    foreach ($files as $file)
    {
        if (file_exists($file))
        {
            require_once $file;
        }
    }
});

$frontendController = new FrontendController();
$backendController = new BackendController();

if(isset($_GET['action']))
{

	// Frontend
	if($_GET['action'] == 'home')
		$frontendController->home();
	elseif($_GET['action'] == 'article')
		$frontendController->article();
	elseif($_GET['action'] == 'login')
		$frontendController->login();
	elseif($_GET['action'] == 'inscription')
		$frontendController->inscription();
	elseif($_GET['action'] == 'deconnexion')
		$frontendController->logout();
	elseif($_GET['action'] == 'account')
		$frontendController->account();
	elseif($_GET['action'] == 'delete')
		$frontendController->deleteUser();
	elseif($_GET['action'] == 'viewarticle')
		$frontendController->viewarticle();
	elseif($_GET['action'] == 'error')
		$frontendController->error();

	// Backend 

	elseif($_GET['action'] == 'newArticle')
		$backendController->newArticle();
	elseif($_GET['action'] == 'updateArticle')
		$backendController->updateArticle();
	elseif($_GET['action'] == 'admin')
		$backendController->admin();
	
}
else
	$frontendController->home();
