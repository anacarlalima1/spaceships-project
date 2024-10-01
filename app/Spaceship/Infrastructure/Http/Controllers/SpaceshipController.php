<?php

namespace App\SpaceShip\Infrastructure\Http\Controllers;

use App\Shared\Infrastructure\Http\Controllers\Controller;
use App\SpaceShip\Application\SpaceshipCreateUseCase;
use App\SpaceShip\Application\SpaceshipDeleteUseCase;
use App\SpaceShip\Application\SpaceshipGetUseCase;
use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use App\SpaceShip\Infrastructure\Http\Requests\SpaceshipRequest;
use App\SpaceShip\Infrastructure\Repositories\SpaceshipApiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpaceshipController extends Controller
{
    private $SpaceshipCreateUseCase;
    private $SpaceshipGetUseCase;
    private $SpaceshipDeleteUseCase;

    public function __construct(SpaceshipApiRepository $spaceshipRepository)
    {
        $this->SpaceshipCreateUseCase = new SpaceshipCreateUseCase($spaceshipRepository);
        $this->SpaceshipDeleteUseCase = new SpaceshipDeleteUseCase($spaceshipRepository);
        $this->SpaceshipGetUseCase = new SpaceshipGetUseCase($spaceshipRepository);
    }

    public function listAll(): JsonResponse
    {
        $SpaceShips = $this->SpaceshipGetUseCase->getAllSpaceShips();
        return response()->json($SpaceShips, 200);
    }

    public function getBySpaceShipId(int $id): JsonResponse
    {
        $SpaceShip = $this->SpaceshipGetUseCase->getSpaceShipById($id);
        return response()->json($SpaceShip, 200);
    }

    public function save(SpaceshipRequest $request): JsonResponse
    {
        $SpaceShipDTO = new SpaceshipDTO($request->all());
        $this->SpaceshipCreateUseCase->createSpaceShip($SpaceShipDTO);

        return response()->json(['message' => 'Espaçonave criada com sucesso!'], 201);
    }

    public function update(SpaceshipRequest $request, int $id): JsonResponse
    {
        $SpaceShipDTO = new SpaceshipDTO($request->all());
        $this->SpaceshipCreateUseCase->updateSpaceShip($id, $SpaceShipDTO);

        return response()->json(['message' => 'Espaçonave atualizada com sucesso!'], 200);
    }

    public function delete(int $id): JsonResponse
    {
        $this->SpaceshipDeleteUseCase->deleteSpaceShip($id);

        return response()->json(['message' => 'Espaçonave deletada com sucesso!'], 200);
    }
}
