<?php

namespace Santiago\WhatsappSdk\Objects\Templates;

use Santiago\WhatsappSdk\Enums\ComponentsTypes;

class Header extends Component
{
    public function __construct(Parameter ...$parameters)
    {
        parent::__construct(ComponentsTypes::Header, ...$parameters);
    }
}
