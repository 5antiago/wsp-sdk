<?php

namespace Santiago\WhatsappSdk\Interactions;

use Exception;
use Santiago\WhatsappSdk\Components\ReplyButton;

class ReplyButtonsInteraction extends BaseInteraction
{
    private array $buttons;
    public function __construct( ReplyButton ...$buttons)
    {
        parent::__construct('button');
        if (count($buttons) > 3) {
            throw new Exception("You cannot have more than 3 Reply Buttons", 1);
        }
        $this->buttons = $buttons;
    }
    public function toJson(): string
    {
        return json_encode([
            'buttons' => array_map(fn (ReplyButton $btn) => $btn->toJson(), $this->buttons)
        ]);
    }
}
