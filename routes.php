<?php
$router->get('', 'ClubsController@homepage');
$router->get('clubs', 'ClubsController@allClubs');
$router->get('clubs/club', 'ClubsController@singleClub');

$router->get('admin/login', "Authenticate@login");
$router->get('admin/signup', "Authenticate@signup");
$router->post('admin/createuser', "Authenticate@createuser");
$router->post('admin/validate', "Authenticate@validate");
$router->get('admin/logout', "Authenticate@logout", true);
$router->get('admin/clubs', "ClubsController@allTrainersClubs", true);
$router->get('admin/clubs/club', "ClubsController@singleTrainersClub", true);

$router->get('admin/clubs/create', "ClubsController@create", true);
$router->post('admin/clubs', "ClubsController@store", true);
$router->get('admin/clubs/edit', "ClubsController@edit", true);
$router->post('admin/clubs/update', "ClubsController@update", true);
$router->post('admin/clubs/destroy', "ClubsController@destroy", true);

$router->get('admin/clubs/trainings/create', "TrainingsController@create", true);
$router->post('admin/clubs/trainings', "TrainingsController@store", true);
$router->get('admin/clubs/training/edit', "TrainingsController@edit", true);
$router->post('admin/clubs/training/update', "TrainingsController@update", true);
$router->post('admin/clubs/training/destroy', "TrainingsController@destroy", true);




