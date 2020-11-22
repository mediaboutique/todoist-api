<?php

namespace MediaBoutique\Todoist\Api\Requests;

use MediaBoutique\Todoist\Api\Models\Section;

class SectionsRequest extends Request
{
    protected string $baseUri = 'sections';

    protected string $modelClass = Section::class;
}
