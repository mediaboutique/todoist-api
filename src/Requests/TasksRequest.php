<?php

namespace MediaBoutique\Todoist\Api\Requests;

use MediaBoutique\Todoist\Api\Models\Comment;
use MediaBoutique\Todoist\Api\Models\Task;

class TasksRequest extends Request
{
    protected string $baseUri = 'tasks';

    protected string $modelClass = Task::class;

    public function close(int $id)
    {
        $response = $this->client->post($this->baseUri.'/'.$id.'/close');
        return ($response->getStatusCode() == 204);
    }

    public function reopen(int $id)
    {
        $response = $this->client->post($this->baseUri.'/'.$id.'/reopen');
        return ($response->getStatusCode() == 204);
    }

    public function getComments(int $taskId): ?array
    {
        $response = $this->client->get('comments?task_id='.$taskId);
        if (in_array($response->getStatusCode(), [200, 204])) {
            $comments = $this->validatedResponse($response);
        }
        if (!empty($comments)) {
            return array_map(function ($iteration) {
                return new Comment($this, $iteration);
            }, $comments);
        }
        return null;
    }
}
