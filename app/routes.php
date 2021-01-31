<?php

$router->get("#^$#", 'PagesController@home');
$router->get("#^logout$#", 'PagesController@logout');
$router->get("#^login$#", 'PagesController@login');
$router->post("#^login$#", 'PagesController@auth');
$router->get("#^project/[0-9]$#", 'PagesController@projectDetail');
$router->get("#^create/project$#", 'PagesController@createProject');
$router->post("#^create/project$#", 'PagesController@submitProject');
$router->get("#^project/[0-9]/add-task$#", 'PagesController@createTask');
$router->post("#^project/[0-9]/add-task$#", 'PagesController@submiTtask');
$router->get("#^search$#", 'PagesController@search');
$router->get("#^archive$#", 'PagesController@archive');
$router->get("#^about$#", 'PagesController@about');
$router->get("#^project/[0-9]/edit$#", 'PagesController@editProject');
$router->post("#^project/[0-9]/edit$#", 'PagesController@submitProjectUpdate');
