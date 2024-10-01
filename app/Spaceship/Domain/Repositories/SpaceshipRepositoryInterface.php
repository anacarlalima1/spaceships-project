<?php

namespace App\SpaceShip\Domain\Repositories;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;

interface SpaceshipRepositoryInterface
{
    public function all(): ?array;
    public function findById(int $id): ?SpaceshipDTO;
    public function save(SpaceshipDTO $SpaceShip): bool;
    public function update(int $id, SpaceshipDTO $SpaceShip): bool;
    public function delete(int $id): bool;
}
