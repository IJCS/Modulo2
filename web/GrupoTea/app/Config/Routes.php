<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$sitio = "grupoTea/public/";

$routes->get('/', 'Home::index');
$routes->get($sitio.'somos', 'Home::somos');
$routes->get($sitio.'acerca', 'Home::acerca');
$routes->post($sitio.'usuarios','Usuarios::create');
$routes->post($sitio.'login','Usuarios::login');
$routes->get($sitio.'perfil','Home::perfil');
$routes->get($sitio.'logout','Usuarios::logout');
$routes->post($sitio.'profesi','Profesionales::create');
$routes->post($sitio.'usuario','Usuarios::modify');
$routes->post($sitio.'turno','Turno::create');
