<?php

namespace App\SpaceShip\Infrastructure\Repositories;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use App\SpaceShip\Domain\DTO\SpaceshipOutputDTO;
use App\SpaceShip\Domain\Repositories\SpaceshipRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SpaceshipApiRepository implements SpaceshipRepositoryInterface
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('SPACESHIP_API_URL');
    }

    public function all(): ?array
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
    public function findById(int $id): ?SpaceshipOutputDTO
    {
        $response = Http::get("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            $data = $response->json();

            return new SpaceshipOutputDTO($data);
        }

        return null;
    }

    public function save(SpaceshipDTO $starship): bool
    {
        $response = Http::post($this->baseUrl, $starship->toArray());

        return $response->successful();
    }
    public function update(int $id, SpaceshipDTO $starship): bool
    {
        $response = Http::put("{$this->baseUrl}/{$id}", $starship->toArray());

        return $response->successful();
    }
    public function delete(int $id): bool
    {
        $response = Http::delete("{$this->baseUrl}/{$id}");

        if ($response->successful()) {
            return true;
        }

        return false;
    }
}
