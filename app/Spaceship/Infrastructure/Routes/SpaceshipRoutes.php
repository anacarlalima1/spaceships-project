<?php

namespace App\SpaceShip\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use App\SpaceShip\Infrastructure\Http\Controllers\SpaceshipController;

class SpaceshipRoutes
{
    public static function routes(): void
    {
        Route::prefix('spaceship')->group(function () {
            Route::get('/list', [SpaceshipController::class, 'listAll']);
            Route::get('/get-id/{id}', [SpaceshipController::class, 'getBySpaceShipId']);
            Route::post('/save', [SpaceshipController::class, 'save']);
            Route::put('/{id}', [SpaceshipController::class, 'update']);
            Route::delete('/{id}', [SpaceshipController::class, 'delete']);
        });
    }
}
