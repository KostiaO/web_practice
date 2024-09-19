<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');
$router->get('/notes', 'notes/index.php')->only("auth");
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');

$router->post('/notes/create', 'notes/store.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/register', 'registration/create.php')->only("guest");
$router->post('/register', 'registration/store.php');

$router->get('/login', 'sessions/create.php')->only("guest");
$router->post('/login', 'sessions/store.php')->only("guest");

$router->delete('/sessions', 'sessions/destroy.php')->only("auth");
