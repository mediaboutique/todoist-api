<?php

namespace MediaBoutique\Todoist\Api\Models\Traits;

trait CanBeFavorited
{
    public function favorite()
    {
        $this->request->update($this->id, ['favorite' => true]);
        return $this;
    }

    public function unfavorite()
    {
        $this->request->update($this->id, ['favorite' => false]);
        return $this;
    }
}
