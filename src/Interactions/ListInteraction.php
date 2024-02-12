<?php

namespace Santiago\WhatsappSdk\Interactions;

use Santiago\WhatsappSdk\Components\Section;

class ListInteraction extends BaseInteraction
{
    private readonly string $text;
    private array $sections;

    public function __construct(string $buttonText, Section ...$sections)
    {
        parent::__construct('list');
        $this->text = $buttonText;
        $this->sections = $sections;
    }

    public function toJson(): string 
    {
        return json_encode([
            'button' => $this->text,
            'sections' => array_map(fn (Section $section) => $section->toJson(), $this->sections)
        ]);
    }
}
