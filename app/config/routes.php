<?php
declare(strict_types=1);

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/', ['controller' => 'Recepti', 'action' => 'index']);
        
        // Uporabniki
        $builder->connect('/login', ['controller' => 'Uporabniki', 'action' => 'login']);
        $builder->connect('/registracija', ['controller' => 'Uporabniki', 'action' => 'registracija']);
        $builder->connect('/logout', ['controller' => 'Uporabniki', 'action' => 'logout']);
        $builder->connect('/admin-panel', ['controller' => 'Uporabniki', 'action' => 'adminPanel']);
        $builder->connect('/user-panel', ['controller' => 'Uporabniki', 'action' => 'userPanel']);

        // Recepti
        $builder->connect('/recepti', ['controller' => 'Recepti', 'action' => 'index']);
        $builder->connect('/recepti/dodaj', ['controller' => 'Recepti', 'action' => 'add']);
        $builder->connect('/recepti/uredi/*', ['controller' => 'Recepti', 'action' => 'edit']);
        $builder->connect('/recepti/izbrisi/*', ['controller' => 'Recepti', 'action' => 'delete']);
        $builder->connect('/recepti/{id}', ['controller' => 'Recepti', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);

        // Forum
        $builder->connect('/forum', ['controller' => 'Forum', 'action' => 'index']);
        $builder->connect('/forum/nova-objava', ['controller' => 'Forum', 'action' => 'add']);
        $builder->connect('/forum/{id}', ['controller' => 'Forum', 'action' => 'view'], ['id' => '\d+', 'pass' => ['id']]);
        $builder->connect('/forum/izbrisi/*', ['controller' => 'Forum', 'action' => 'delete']);

        // Komentarji
        $builder->connect('/komentarji/dodaj/*', ['controller' => 'Komentarji', 'action' => 'dodaj']);
        $builder->connect('/komentarji/izbrisi/*', ['controller' => 'Komentarji', 'action' => 'izbrisi']);

        $builder->fallbacks(DashedRoute::class);
    });
};