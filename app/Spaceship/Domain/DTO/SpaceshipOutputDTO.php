<?php

namespace App\SpaceShip\Domain\DTO;
use Illuminate\Contracts\Validation\Validator;

use App\Shared\Domain\DTO\AbstractDTO;
use App\Shared\Domain\DTO\InterfaceDTO;

class SpaceshipOutputDTO extends AbstractDTO implements InterfaceDTO
{
    public $model;
    public $name;
    public $SpaceShip_class;
    public $MGLT;
    public $hyperdrive_rating;
    public $consumables;
    public $cargo_capacity;
    public $crew;
    public $passengers;
    public $max_atmosphering_speed;
    public $cost;
    public $manufacturer;
    public $length;

    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->model = $data['model'] ?? null;
        $this->manufacturer = $data['manufacturer'] ?? null;
        $this->cost = isset($data['cost']) ? (float) $data['cost'] : null;
        $this->length = isset($data['length']) ? (float) $data['length'] : null;
        $this->max_atmosphering_speed = isset($data['max_atmosphering_speed']) ? (int) $data['max_atmosphering_speed'] : null;
        $this->crew = isset($data['crew']) ? (int) $data['crew'] : null;
        $this->passengers = isset($data['passengers']) ? (int) $data['passengers'] : null;
        $this->cargo_capacity = isset($data['cargo_capacity']) ? (float) $data['cargo_capacity'] : null;
        $this->consumables = $data['consumables'] ?? null;
        $this->hyperdrive_rating = isset($data['hyperdrive_rating']) ? (float) $data['hyperdrive_rating'] : null;
        $this->MGLT = isset($data['MGLT']) ? (int) $data['MGLT'] : null;
        $this->SpaceShip_class = $data['SpaceShip_class'] ?? null;

        $this->validate();
    }
    public static function rules(): array
    {
        return [];
    }

    public static function messages(): array
    {
        return [];
    }

    public function validator(): Validator
    {
        return validator($this->all(), $this->rules(), $this->messages());
    }

    public function validate(): array
    {
        return $this->validator()->validate();
    }
}
