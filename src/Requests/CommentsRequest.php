<?php

namespace MediaBoutique\Todoist\Api\Requests;

use MediaBoutique\Todoist\Api\Models\Comment;

class CommentsRequest extends Request
{
    protected string $baseUri = 'comments';

    protected string $modelClass = Comment::class;
}
