<?php

namespace Santiago\WhatsappSdk\Objects\Templates;

use Santiago\WhatsappSdk\Enums\ComponentsTypes;

class Body extends Component
{
    public function __construct(Parameter ...$parameters)
    {
        parent::__construct(ComponentsTypes::Body, ...$parameters);
    }
}
