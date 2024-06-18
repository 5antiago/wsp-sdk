<?php

namespace Santiago\WhatsappSdk\Objects\Templates;

use Santiago\WhatsappSdk\Enums\ComponentsTypes;
use Santiago\WhatsappSdk\Interfaces\Arrayable;
use Santiago\WhatsappSdk\Interfaces\Jsonable;

class Component implements Jsonable, Arrayable
{
    private array $parameters;
    public function __construct(
        private ComponentsTypes $type,
        Parameter  ...$parameters
    ) {
        $this->parameters = $parameters;
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'parameters' => array_map(fn (Parameter $parameter) => $parameter->toArray(), $this->parameters)
        ];
    }
}
