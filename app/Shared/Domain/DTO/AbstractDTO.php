<?php

namespace App\Shared\Domain\DTO;

use Illuminate\Contracts\Support\Arrayable;

abstract class AbstractDTO implements Arrayable
{
    public function all():array{
        return get_object_vars($this);
    }

    public function toArray():array{
        return array_filter($this->all(), fn ($value) => !is_null($value));
    }
}
