<?php

namespace App\SpaceShip\Application;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use App\SpaceShip\Domain\Repositories\SpaceshipRepositoryInterface;
use Illuminate\Validation\ValidationException;

class SpaceshipGetUseCase
{
    private $SpaceShipRepository;

    public function __construct(SpaceshipRepositoryInterface $spaceShipRepository)
    {
        $this->SpaceShipRepository = $spaceShipRepository;
    }

    public function getAllSpaceShips(): ?array
    {
        $SpaceShips = $this->SpaceShipRepository->all();

        if (is_null($SpaceShips)) {
            throw ValidationException::withMessages(['default' => 'Falha ao buscar lista de espaçonaves.']);
        }

        return $SpaceShips;
    }

    public function getSpaceShipById(int $id): ?SpaceshipDTO
    {
        $SpaceShip = $this->SpaceShipRepository->findById($id);

        if (is_null($SpaceShip)) {
            throw ValidationException::withMessages(['id' => 'A espaçonave não foi encontrada.']);
        }

        return $SpaceShip;
    }
}
