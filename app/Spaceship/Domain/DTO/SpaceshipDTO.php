<?php

namespace App\SpaceShip\Domain\DTO;
use Illuminate\Contracts\Validation\Validator;

use App\Shared\Domain\DTO\InterfaceDTO;
use App\Shared\Domain\DTO\AbstractDTO;

class SpaceshipDTO extends AbstractDTO implements InterfaceDTO
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'model' => ['nullable', 'string', 'max:255'],
            'manufacturer' => ['nullable', 'string', 'max:255'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'length' => ['nullable', 'numeric', 'min:0'],
            'max_atmosphering_speed' => ['nullable', 'integer', 'min:0'],
            'crew' => ['nullable', 'integer', 'min:0'],
            'passengers' => ['nullable', 'integer', 'min:0'],
            'cargo_capacity' => ['nullable', 'numeric', 'min:0'],
            'consumables' => ['nullable', 'string', 'max:255'],
            'hyperdrive_rating' => ['nullable', 'numeric', 'between:0,10'],
            'MGLT' => ['nullable', 'integer', 'min:0'],
            'SpaceShip_class' => ['nullable', 'string', 'max:255'],
        ];
    }
    public static function messages(): array
    {
        return [
            'name.required' => 'O nome da espaçonave é obrigatório.',
            'name.string' => 'O nome da espaçonave deve ser uma string.',
            'name.max' => 'O nome da espaçonave não pode ter mais de 255 caracteres.',
            'model.string' => 'O modelo deve ser uma string.',
            'model.max' => 'O modelo não pode ter mais de 255 caracteres.',
            'manufacturer.string' => 'O fabricante deve ser uma string.',
            'manufacturer.max' => 'O fabricante não pode ter mais de 255 caracteres.',
            'cost.numeric' => 'O custo deve ser um número.',
            'cost.min' => 'O custo deve ser maior ou igual a 0.',
            'length.numeric' => 'O comprimento deve ser um número.',
            'length.min' => 'O comprimento deve ser maior ou igual a 0.',
            'max_atmosphering_speed.integer' => 'A velocidade atmosférica máxima deve ser um número inteiro.',
            'max_atmosphering_speed.min' => 'A velocidade atmosférica máxima deve ser maior ou igual a 0.',
            'crew.integer' => 'A tripulação deve ser um número inteiro.',
            'crew.min' => 'A tripulação deve ser maior ou igual a 0.',
            'passengers.integer' => 'O número de passageiros deve ser um número inteiro.',
            'passengers.min' => 'O número de passageiros deve ser maior ou igual a 0.',
            'cargo_capacity.numeric' => 'A capacidade de carga deve ser um número.',
            'cargo_capacity.min' => 'A capacidade de carga deve ser maior ou igual a 0.',
            'consumables.string' => 'O campo consumíveis deve ser uma string.',
            'consumables.max' => 'O campo consumíveis não pode ter mais de 255 caracteres.',
            'hyperdrive_rating.numeric' => 'A classificação do hiperdrive deve ser um número.',
            'hyperdrive_rating.between' => 'A classificação do hiperdrive deve estar entre 0 e 10.',
            'MGLT.integer' => 'O campo MGLT deve ser um número inteiro.',
            'MGLT.min' => 'O campo MGLT deve ser maior ou igual a 0.',
            'SpaceShip_class.string' => 'O campo classe da espaçonave deve ser uma string.',
            'SpaceShip_class.max' => 'A classe da espaçonave não pode ter mais de 255 caracteres.',
        ];
    }

    public function validator(): Validator
    {
        return validator($this->all(), self::rules(), self::messages());
    }

    public function validate(): array
    {
        return $this->validator()->validate();
    }
}
