<?php

namespace MediaBoutique\Todoist\Api\Models;

class Comment extends Model
{
    public int $id;

    public int $task_id;

    public int $project_id;

    public string $posted;

    public string $content;

    public array $attachment;

    protected array $creatable = [
        'task_id',
        'project_id',
        'content',
        'attachment',
    ];

    protected array $updatable = [
        'content',
    ];
}
