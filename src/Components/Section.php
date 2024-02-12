<?php

namespace Santiago\WhatsappSdk\Components;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

class Section implements Jsonable
{

    private readonly string $title;
    private readonly array $rows;

    public function __construct(string $title, Row ...$rows)
    {
        $this->title = $title;
        $this->rows = $rows;
    }

    public function toJson(): string
    {
        return json_encode([
            'title' => $this->title,
            'rows'=> array_map(fn (Row $row) => $row->toJson(), $this->rows),
        ]);
    }
}

