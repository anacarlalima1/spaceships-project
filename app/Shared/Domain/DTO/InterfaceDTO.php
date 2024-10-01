<?php

namespace App\Shared\Domain\DTO;

use Illuminate\Contracts\Validation\Validator;

interface InterfaceDTO
{
    public static function rules():array;
    public static function messages():array;
    public function validator():Validator;
    public function validate():array;
}
