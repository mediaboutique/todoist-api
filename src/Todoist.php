<?php

namespace MediaBoutique\Todoist\Api;

use Exception;
use GuzzleHttp\Client;
use MediaBoutique\Todoist\Api\Models\Comment;
use MediaBoutique\Todoist\Api\Models\Label;
use MediaBoutique\Todoist\Api\Models\Project;
use MediaBoutique\Todoist\Api\Models\Section;
use MediaBoutique\Todoist\Api\Models\Task;
use MediaBoutique\Todoist\Api\Requests\LabelsRequest;
use MediaBoutique\Todoist\Api\Requests\ProjectsRequest;
use MediaBoutique\Todoist\Api\Requests\SectionsRequest;
use MediaBoutique\Todoist\Api\Requests\TasksRequest;

class Todoist
{
    protected Client $client;

    protected ?LabelsRequest $labelsRequest;

    protected ?ProjectsRequest $projectsRequest;

    protected ?SectionsRequest $sectionsRequest;

    protected ?TasksRequest $tasksRequest;

    public function __construct(string $token)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.todoist.com/rest/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ]
        ]);
        return $this;
    }

    /*
     * Request handlers
     */

    public function labels(): LabelsRequest
    {
        return $this->labelsRequest = ($this->labelsRequest ?? new LabelsRequest($this->client));
    }

    public function projects(): ProjectsRequest
    {
        return $this->projectsRequest = ($this->projectsRequest ?? new ProjectsRequest($this->client));
    }

    public function sections(): SectionsRequest
    {
        return $this->sectionsRequest = ($this->sectionsRequest ?? new SectionsRequest($this->client));
    }

    public function tasks(): TasksRequest
    {
        return $this->tasksRequest = ($this->tasksRequest ?? new TasksRequest($this->client));
    }

    /*
     * Models
     */

    public function comment(int $id): Comment
    {
        $comment = $this->comments()->get($id);
        if (!$comment) {
            throw new Exception('Comment not found!');
        }
        return $comment;
    }

    public function label(int $id): Label
    {
        $label = $this->labels()->get($id);
        if (!$label) {
            throw new Exception('Label not found!');
        }
        return $label;
    }

    public function project(int $id): Project
    {
        $project = $this->projects()->get($id);
        if (!$project) {
            throw new Exception('Project not found!');
        }
        return $project;
    }

    public function section(int $id): Section
    {
        $section = $this->sections()->get($id);
        if (!$section) {
            throw new Exception('Section not found!');
        }
        return $section;
    }

    public function task(int $id): Task
    {
        $task = $this->tasks()->get($id);
        if (!$task) {
            throw new Exception('Task not found!');
        }
        return $task;
    }
}
