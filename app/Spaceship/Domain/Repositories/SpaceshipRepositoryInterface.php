<?php

namespace App\SpaceShip\Domain\Repositories;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use App\SpaceShip\Domain\DTO\SpaceshipOutputDTO;

interface SpaceshipRepositoryInterface
{
    public function all(): ?array;
    public function findById(int $id): ?SpaceshipOutputDTO;
    public function save(SpaceshipDTO $SpaceShip): bool;
    public function update(int $id, SpaceshipDTO $SpaceShip): bool;
    public function delete(int $id): bool;
}
