<?php

namespace MediaBoutique\Todoist\Api\Models;

class Section extends Model
{
    public int $id;

    public int $project_id;

    public int $order;

    public string $name;

    protected array $creatable = [
        'name',
        'project_id',
        'order',
    ];

    protected array $updatable = [
        'name',
    ];
}
