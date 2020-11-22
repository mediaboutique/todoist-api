<?php

namespace MediaBoutique\Todoist\Api\Requests;

use MediaBoutique\Todoist\Api\Models\Collaborator;
use MediaBoutique\Todoist\Api\Models\Comment;
use MediaBoutique\Todoist\Api\Models\Project;
use MediaBoutique\Todoist\Api\Models\Section;
use MediaBoutique\Todoist\Api\Models\Task;

class ProjectsRequest extends Request
{
    protected string $baseUri = 'projects';

    protected string $modelClass = Project::class;

    public function getCollaborators(int $projectId): ?array
    {
        $response = $this->client->get($this->baseUri.'/'.$projectId.'/collaborators');
        if (in_array($response->getStatusCode(), [200, 204])) {
            $results = $this->validatedResponse($response);
        }
        if (!empty($results)) {
            return array_map(function ($iteration) {
                return new Collaborator($this, $iteration);
            }, $results);
        }
        return null;
    }

    public function getComments(int $projectId): ?array
    {
        $response = $this->client->get('comments?project_id='.$projectId);
        if (in_array($response->getStatusCode(), [200, 204])) {
            $results = $this->validatedResponse($response);
        }
        if (!empty($results)) {
            return array_map(function ($iteration) {
                return new Comment($this, $iteration);
            }, $results);
        }
        return null;
    }

    public function getSections(int $projectId): ?array
    {
        $response = $this->client->get('sections?project_id='.$projectId);
        if (in_array($response->getStatusCode(), [200, 204])) {
            $results = $this->validatedResponse($response);
        }
        if (!empty($results)) {
            return array_map(function ($iteration) {
                return new Section($this, $iteration);
            }, $results);
        }
        return null;
    }

    public function getTasks(int $projectId): ?array
    {
        $response = $this->client->get('tasks?project_id='.$projectId);
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
