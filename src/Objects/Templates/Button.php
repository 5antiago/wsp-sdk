<?php

namespace Santiago\WhatsappSdk\Objects\Templates;

use Override;
use Santiago\WhatsappSdk\Enums\ButtonSubTypes;
use Santiago\WhatsappSdk\Enums\ComponentsTypes;

class Button extends Component
{
    public function __construct(
        private ButtonSubTypes $type,
        private int $index,
        Parameter  ...$parameters
    ) {
        parent::__construct(ComponentsTypes::Button, ...$parameters);
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    #[Override]
    public function toArray(): array
    {
        return parent::toArray() + [
            'index' => $this->index,
            'sub_type' => $this->type->value,
        ];
    }
}
