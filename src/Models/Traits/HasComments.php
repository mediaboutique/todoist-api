<?php

namespace MediaBoutique\Todoist\Api\Models\Traits;

trait HasComments
{
    public function comments(): ?array
    {
        return $this->request->getComments($this->id);
    }
}
