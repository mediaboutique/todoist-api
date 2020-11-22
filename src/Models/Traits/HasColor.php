<?php

namespace MediaBoutique\Todoist\Api\Models\Traits;

use MediaBoutique\Todoist\Api\Support\Color;

trait HasColor
{
    public function color(): ?array
    {
        return (!empty($this->color) ? Color::getById($this->color) : null);
    }
}
