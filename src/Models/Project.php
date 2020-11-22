<?php

namespace MediaBoutique\Todoist\Api\Models;

use MediaBoutique\Todoist\Api\Models\Traits\CanBeFavorited;
use MediaBoutique\Todoist\Api\Models\Traits\HasColor;
use MediaBoutique\Todoist\Api\Models\Traits\HasComments;

class Project extends Model
{
    use CanBeFavorited, HasColor, HasComments;

    public int $id;

    public string $name;

    public int $color;

    public int $parent_id;

    public int $order;

    public int $comment_count;

    public bool $shared;

    public bool $favorite;

    public bool $inbox_project;

    public bool $team_inbox;

    public int $sync_id;

    protected array $creatable = [
        'name',
        'parent_id',
        'color',
        'favorite'
    ];

    protected array $updatable = [
        'name',
        'color',
        'favorite'
    ];

    public function parent(): ?Project
    {
        return ($this->parent_id ? $this->request->get($this->parent_id) : null);
    }

    public function collaborators(): ?array
    {
        return $this->request->getCollaborators($this->id);
    }

    public function sections(): ?array
    {
        return $this->request->getSections($this->id);
    }

    public function tasks(): ?array
    {
        return $this->request->getTasks($this->id);
    }
}
