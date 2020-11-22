<?php

namespace MediaBoutique\Todoist\Api\Models;

use MediaBoutique\Todoist\Api\Models\Traits\HasComments;

class Task extends Model
{
    use HasComments;

    public int $id;

    public int $project_id;

    public int $section_id;

    public string $content;

    public bool $completed;

    public array $label_ids;

    public int $parent_id;

    public int $order;

    public int $priority;

    public array $due;

    public string $url;

    public int $comment_count;

    public int $assignee;

    protected array $creatable = [
        'content',
        'project_id',
        'section_id',
        'parent_id',
        'order',
        'label_ids',
        'priority',
        'due_string',
        'due_date',
        'due_datetime',
        'due_lang',
        'assignee',
    ];

    protected array $updatable = [
        'content',
        'label_ids',
        'priority',
        'due_string',
        'due_date',
        'due_datetime',
        'due_lang',
        'assignee',
    ];

    public function close()
    {
        $this->request->close($this->id);
        return $this;
    }

    public function reopen()
    {
        $this->request->close($this->id);
        return $this;
    }
}
