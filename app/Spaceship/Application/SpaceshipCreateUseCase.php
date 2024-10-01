<?php

namespace App\SpaceShip\Application;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use App\SpaceShip\Domain\Repositories\SpaceshipRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SpaceshipCreateUseCase
{
    private $SpaceShipRepository;

    public function __construct(SpaceshipRepositoryInterface $spaceShipRepository)
    {
        $this->SpaceShipRepository = $spaceShipRepository;
    }

    public function createSpaceShip(SpaceshipDTO $SpaceShipDTO): void
    {
        try {
            $this->SpaceShipRepository->save($SpaceShipDTO);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            throw ValidationException::withMessages(['default' => 'Falha ao criar espaçonave.']);
        }
    }

    public function updateSpaceShip(int $id, SpaceshipDTO $SpaceShipDTO): void
    {
        try {
            $SpaceShipExists = $this->SpaceShipRepository->findById($id);

            if (!$SpaceShipExists) {
                throw ValidationException::withMessages(['id' => 'A espaçonave não existe.']);
            }

            $this->SpaceShipRepository->update($id, $SpaceShipDTO);
        } catch (ValidationException $validationException) {
            throw $validationException;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            throw ValidationException::withMessages(['default' => 'Falha ao atualizar espaçonave.']);
        }
    }
}
