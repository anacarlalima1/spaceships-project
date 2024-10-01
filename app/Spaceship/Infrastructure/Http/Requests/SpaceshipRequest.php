<?php

namespace App\SpaceShip\Infrastructure\Http\Requests;

use App\SpaceShip\Domain\DTO\SpaceshipDTO;
use Illuminate\Foundation\Http\FormRequest;

class SpaceshipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            ...SpaceshipDTO::rules()

        ];
    }
    public function messages(): array
    {
        return [
            ...SpaceshipDTO::messages()
        ];
    }
}
