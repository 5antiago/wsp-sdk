<?php

namespace Santiago\WhatsappSdk\Interactions;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

abstract class BaseInteraction implements Jsonable
{
    abstract public function toJson(): string;

    public function __construct(private string $type)
    {
        //
    }
    public function getType() : string
    {
        return $this->type;
    }
}
