<?php

namespace MediaBoutique\Todoist\Api\Requests;

use MediaBoutique\Todoist\Api\Models\Label;
use MediaBoutique\Todoist\Api\Models\Task;

class LabelsRequest extends Request
{
    protected string $baseUri = 'labels';

    protected string $modelClass = Label::class;

    public function getTasks(int $labelId): ?array
    {
        $response = $this->client->get('tasks?label_id='.$labelId);
        if (in_array($response->getStatusCode(), [200, 204])) {
            $results = $this->validatedResponse($response);
        }
        if (!empty($results)) {
            return array_map(function ($iteration) {
                return new Task($this, $iteration);
            }, $results);
        }
        return null;
    }
}
