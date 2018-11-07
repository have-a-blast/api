<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    Router::scope('/api', function (RouteBuilder $routes) {
        \Cake\Core\Configure::write('using_api', true);

    });
    $routes->resources('Activities', function (RouteBuilder $routes) {
        $routes->resources('Users', ['prefix' => 'activities', 'only' => ['index', 'create', 'delete']]);
        $routes->resources('Applications', ['only' => ['index']]);
        $routes->resources('Reviews', ['only' => ['index']]);
    });

    $routes->resources('Applications', ['only' => ['create', 'update', 'delete']]);

    $routes->resources('Reviews', ['only' => ['create', 'update', 'delete']]);

    $routes->resources('Locations', ['only' => ['view', 'create']]);

    $routes->resources('Users', ['only' => ['view', 'create', 'update', 'delete']], function (RouteBuilder $routes) {
        $routes->resources('Locations', ['only' => ['update']]);
    });

    $routes->resources('Tags', ['only' => ['index', 'view']], function (RouteBuilder $routes) {
        $routes->resources('Activities', ['only' => ['index']]);
    });

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
