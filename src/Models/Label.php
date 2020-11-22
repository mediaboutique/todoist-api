<?php

namespace MediaBoutique\Todoist\Api\Models;

use MediaBoutique\Todoist\Api\Models\Traits\CanBeFavorited;
use MediaBoutique\Todoist\Api\Models\Traits\HasColor;

class Label extends Model
{
    use CanBeFavorited, HasColor;

    public int $id;

    public string $name;

    public int $color;

    public int $order;

    public bool $favorite;

    protected array $creatable = [
        'name',
        'order',
        'color',
        'favorite',
    ];

    protected array $updatable = [
        'name',
        'order',
        'color',
        'favorite',
    ];

    public function tasks(): ?array
    {
        return $this->request->getTasks($this->id);
    }
}
