<?php
declare(strict_types=1);

/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Phalcon\Mvc\Router;

/**
 * @var $router Router
 */


$router->add('/categories/{id}',[
    'controller' => 'categories',
    'action'     => 'goods'
]);

$router->add('/categories/good/{id}',[
    'controller' => 'categories',
    'action'     => 'good'
]);

$router->add('/categories/good/addtocart/{id}', [
    'controller' => 'cart',
    'action'     => 'addtocart'
]);

// $router->add('/cart', [
//     'controller' => 'cart',
//     'action'     => 'index'
// ]);