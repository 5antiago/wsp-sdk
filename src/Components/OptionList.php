<?php

namespace Santiago\WhatsappSdk\Components;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

class OptionList implements Jsonable
{
    private string $text;
    private array $sections;

    public function __construct(string $buttonText, Section ...$sections)
    {
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
