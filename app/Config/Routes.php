<?php

use App\Config\Menu;
use App\Config\ModuleRoute;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Auth\LoginController::index');
$routes->get('/register', 'Auth\LoginController::register');
$routes->post('/login', 'Auth\LoginController::auth');
$routes->post('/register', 'Auth\LoginController::doRegister');
$routes->get('/logout', 'Auth\LoginController::logout');


$routes->get('/', 'Home::index');
$routes->get('/search', 'Home::search');
$routes->get('/order', 'Home::order', ['filter' => 'auth']);
$routes->post('/order', 'Home::doOrder', ['filter' => 'auth']);
$routes->get('/dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('sitemap.xml', 'Home::sitemap');

$menu = Menu::get();

foreach($menu as $item)
{
    if(isset($item['controller']) && $item['controller'])
    {
        $routes->get('/'.$item['slug'].'', $item['controller'].'::index', ['filter' => 'auth']);
        $routes->get('/'.$item['slug'].'/create', $item['controller'].'::create', ['filter' => 'auth']);
        $routes->post('/'.$item['slug'].'/create', $item['controller'].'::store', ['filter' => 'auth']);
        $routes->get('/'.$item['slug'].'/(:num)', $item['controller'].'::show/$1', ['filter' => 'auth']);
        $routes->delete('/'.$item['slug'].'/(:num)', $item['controller'].'::delete/$1', ['filter' => 'auth']);
        $routes->get('/'.$item['slug'].'/(:num)/edit', $item['controller'].'::edit/$1', ['filter' => 'auth']);
        $routes->post('/'.$item['slug'].'/(:num)/edit', $item['controller'].'::update/$1', ['filter' => 'auth']);
    }
}

$moduleRoute = ModuleRoute::get();
foreach($moduleRoute as $slug => $controller)
{
    $routes->get('/'.$slug.'', $controller.'::index', ['filter' => 'auth']);
    $routes->get('/'.$slug.'/create', $controller.'::create', ['filter' => 'auth']);
    $routes->post('/'.$slug.'/create', $controller.'::store', ['filter' => 'auth']);
    $routes->get('/'.$slug.'/(:num)', $controller.'::show/$1', ['filter' => 'auth']);
    $routes->delete('/'.$slug.'/(:num)', $controller.'::delete/$1', ['filter' => 'auth']);
    $routes->get('/'.$slug.'/(:num)/edit', $controller.'::edit/$1', ['filter' => 'auth']);
    $routes->post('/'.$slug.'/(:num)/edit', $controller.'::update/$1', ['filter' => 'auth']);
}

$routes->get('/penyewaan/invoice/(:num)', 'Lbs\PenyewaanController::invoice/$1', ['filter' => 'auth']);
$routes->get('/keuangan', 'Lbs\KeuanganController::index', ['filter' => 'auth']);