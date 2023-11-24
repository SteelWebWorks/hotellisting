<?php

use App\Controllers\OffersCronJobController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'OfferController::index');

$routes->get('cron/refresh-offers', [OffersCronJobController::class, 'process']);
