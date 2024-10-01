<?php

namespace App\SpaceShip\Application;

use App\SpaceShip\Domain\Repositories\SpaceshipRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SpaceshipDeleteUseCase
{
    private $SpaceShipRepository;

    public function __construct(SpaceshipRepositoryInterface $spaceShipRepository)
    {
        $this->SpaceShipRepository = $spaceShipRepository;
    }


    public function deleteSpaceShip(int $id): void
    {
        try {
            $SpaceShipExists = $this->SpaceShipRepository->findById($id);

            if (!$SpaceShipExists) {
                throw ValidationException::withMessages(['id' => 'A espaçonave não existe.']);
            }

            $this->SpaceShipRepository->delete($id);
        } catch (ValidationException $validationException) {
            throw $validationException;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            throw ValidationException::withMessages(['default' => 'Falha ao deletar espaçonave.']);
        }
    }
}
