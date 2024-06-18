<?php

namespace Santiago\WhatsappSdk\Messages\Outcoming;

use Override;
use Santiago\WhatsappSdk\Enums\SupportedLanguages;
use Santiago\WhatsappSdk\Objects\Message;
use Santiago\WhatsappSdk\Objects\Templates\Component;

class TemplateMessage extends Message
{
    private array $components;

    public function __construct(
        private string $phoneNumber,
        private string $templateName,
        private SupportedLanguages $languageCode,
        Component ...$components

    ) {
        $this->components = $components;
        parent::__construct($phoneNumber, 'template');
    }
    #[Override]
    public function toJson(): string
    {
        $data = parent::toArray();
        $data += [
            'template' => [
                'name' => $this->templateName,
                'language' => [
                    'code' => $this->languageCode->value
                ],
                'components' => array_map(fn (Component $component) => $component->toArray(), $this->components)
            ]
        ];
        return json_encode($data);
    }
}
