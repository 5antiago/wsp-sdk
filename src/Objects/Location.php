<?php

namespace Santiago\WhatsappSdk\Objects;

use Santiago\WhatsappSdk\Interfaces\Arrayable;
use Santiago\WhatsappSdk\Interfaces\Jsonable;

class Location implements Jsonable, Arrayable
{
    public function __construct(
        private string $latitude,
        private string $longitude,
        private string $name,
        private string $address
    ) {
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'name' => $this->name,
            'address' => $this->address
        ];
    }
}
