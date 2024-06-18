<?php

namespace Santiago\WhatsappSdk\Objects\Templates;

use Santiago\WhatsappSdk\Enums\ParameterTypes;
use Santiago\WhatsappSdk\Interfaces\Arrayable;
use Santiago\WhatsappSdk\Interfaces\Jsonable;
use Santiago\WhatsappSdk\Objects\Media;

class Parameter implements Jsonable, Arrayable
{
    public function __construct(
        private ParameterTypes $type,
        private string|Media $value
    ) {
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            $this->type->value => $this->value instanceof Media ? $this->value->toArray() : $this->value
        ];
    }
}
